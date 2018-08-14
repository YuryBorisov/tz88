<?php

namespace App\Transports;


class FlightTransport extends Transport
{

    public function __construct($number, $route)
    {
        parent::__construct(self::FLIGHT, $number, $route);
    }

    public  function getName()
    {
        return 'flight';
    }
}