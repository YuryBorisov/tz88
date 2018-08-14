<?php

namespace App\Transports;


class BalloonTransport extends Transport
{

    public function __construct($number, $route)
    {
        parent::__construct(self::BALLOON, $number, $route);
    }

    public function getName()
    {
        return 'balloon';
    }
}