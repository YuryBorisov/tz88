<?php

namespace App;


class Route
{

    private $name;
    private $from;
    private $to;

    /**
     * Route constructor.
     * @param $name
     * @param $from
     * @param $to
     */
    public function __construct($name, $from, $to)
    {
        $this->name = $name;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

}