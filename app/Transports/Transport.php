<?php

namespace App\Transports;

use App\Route;

abstract class Transport
{

    const TRAIN = 0;
    const BUS = 1;
    const FLIGHT = 3;
    const BALLOON = 4;

    /**
     * @var Transport
     * @see Transport
     */
    protected $type;

    /**
     * @var integer|string
     */
    protected $number;

    /**
     * @var Transport
     * @see Route
     */
    protected $route;

    /**
     * Transport constructor.
     * @param $type
     * @param $number
     * @param $route
     */
    public function __construct($type, $number, Route $route)
    {
        $this->type = $type;
        $this->number = $number;
        $this->route = $route;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return Route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param Route $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

    public abstract function getName();

}