<?php

namespace App\Transports;


class BusTransport extends Transport
{

    public function __construct($number, $route)
    {
        parent::__construct(self::BUS, $number, $route);
    }

    public function getName()
    {
        return 'bus';
    }
}