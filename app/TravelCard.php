<?php

namespace App;

use App\Transports\Transport;

class TravelCard
{

    /**
     * @var Transport
     * @see Transport
     */
    private $transport;

    /**
     * @var integer|string
     * сидинье
     */
    private $seat;

    /**
     * @var string
     */
    private $baggage;

    /**
     * TravelCard constructor.
     * @param Transport $transport
     * @param int|string $seat
     */
    public function __construct(Transport $transport, $seat)
    {
        $this->transport = $transport;
        $this->seat = $seat;
    }

    /**
     * @return Transport
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param Transport $transport
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
    }

    /**
     * @return int|string
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param int|string $seat
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
    }

    /**
     * @return string
     */
    public function getBaggage()
    {
        return $this->baggage;
    }

    /**
     * @param string $baggage
     */
    public function setBaggage($baggage)
    {
        $this->baggage = $baggage;
    }

}