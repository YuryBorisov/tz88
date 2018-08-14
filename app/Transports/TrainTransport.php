<?php

namespace App\Transports;


class TrainTransport extends Transport
{

    public function __construct($number, $route)
    {
        parent::__construct(self::TRAIN, $number, $route);
    }

    public  function getName()
    {
        return 'train';
    }

}