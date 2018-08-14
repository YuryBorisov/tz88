<?php

namespace App\Http\Controllers;

use App\Route;
use App\TravelCard;
use App\Transports\TransportFactory;

class HomeController extends BaseController
{

    public function index()
    {
        $result = json_decode($_REQUEST['json'], true);
        if (json_last_error() === JSON_ERROR_NONE && $this->validation($result)) {

            $cards = $sortedCards = $from = $to = $start = [];

            foreach ($result as $r) {
                 $route = new Route($r['route']['name'], $r['route']['from'], $r['route']['to']);
                 $from[] = $route->getFrom();
                 $to[] = $route->getTo();
                 $transport = TransportFactory::factory($r['transport']['type'], $r['transport']['number'], $route);
                 $card = new TravelCard($transport, $r['seat']);
                 $cards[] = $card;
            }

            sort($from);
            sort($to);

            for ($i = 0; $i < count($from); $i++) {
                if ($from[$i] != $to[$i]) {
                    if ($from[$i + 1] == $to[$i] || $from[$i + 1] === $to[$i + 1]) {
                        $start = $from[$i];
                        break;
                    } else {
                        unset($to[$i]);
                    }
                }
            }

            $this->sortCards($start, $cards, $sortedCards);

            foreach ($sortedCards as $card) {
                $s = 'Take ' . $card->getTransport()->getName() .
                    ' from ' . $card->getTransport()->getRoute()->getFrom() .
                    ' to ' . $card->getTransport()->getRoute()->getTo() .
                    '. Route number ' . $card->getTransport()->getRoute()->getName() .
                    '. Seat ' . $card->getSeat();
                $this->json['result']['str'] .= $s . "\n";
                $this->json['result']['items'][] = $s;
            }
            $this->json['status'] = true;
        } else
            $this->json['error']['message'] = 'invalid json';

        echo json_encode($this->json);

        /*
        $arr = [
            [
                'transport' => [
                    'type' => 'train',
                    'number' => '34F'
                ],
                'route' => [
                    'from' => 'Saint Petersburg',
                    'to' => 'Moscow',
                    'name' => '54S'
                ],
                'seat' => 18
            ],
            [
                'transport' => [
                    'type' => 'bus',
                    'number' => 'BBE 8420'
                ],
                'route' => [
                    'from' => 'Tyumen',
                    'to' => 'Voronezh',
                    'name' => '8M'
                ],
                'seat' => 4
            ],
            [
                'transport' => [
                    'type' => 'flight',
                    'number' => '2L'
                ],
                'route' => [
                    'from' => 'Moscow',
                    'to' => 'Tyumen',
                    'name' => '2L'
                ],
                'seat' => 26
            ],
            [
                'transport' => [
                    'type' => 'balloon',
                    'number' => '7777'
                ],
                'route' => [
                    'from' => 'Lipetsk',
                    'to' => 'Saint Petersburg',
                    'name' => '48Y'
                ],
                'seat' => 42
            ]
        ];

        var_dump(json_encode($arr));
         */
    }

    private function sortCards($start, $cards, &$sortedCards)
    {
        $countCards = count($cards);
        if (count($sortedCards) != $countCards) {
            for ($i = 0; $i < $countCards; $i++)
                if ($cards[$i]->getTransport()->getRoute()->getFrom() == $start) {
                    $sortedCards[] = $cards[$i];
                    $start = $cards[$i]->getTransport()->getRoute()->getTo();
                }
            $this->sortCards($start, $cards, $sortedCards);
        }
    }

    private function validation($arr) {
        $flag = true;
        foreach ($arr as $a) {
            if (!isset($a['route']['name'],
                $a['route']['from'],
                $a['route']['to'],
                $a['transport']['type'],
                $a['transport']['number'],
                $a['seat'])) {
                $flag = false;
                break;
            }
        }
        return $flag;
    }

}