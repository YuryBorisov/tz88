<?php

namespace App\Transports;


class TransportFactory
{

    public static function factory($type, $number, $route)
    {
        $obj = null;
        switch ($type) {
            case 'train':
                $obj = new TrainTransport($number, $route);
                break;
            case 'bus':
                $obj = new BusTransport($number, $route);
                break;
            case 'flight':
                $obj = new FlightTransport($number, $route);
                break;
            case 'balloon':
                $obj = new BalloonTransport($number, $route);
        }
        return $obj;
    }

}