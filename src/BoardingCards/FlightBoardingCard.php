<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 00:58
 */

namespace TripSorter\BoardingCards;


class FlightBoardingCard extends AbstractBoardingCard implements BaggageClaimInterface
{
    /**
     * @var string
     */
    private $flightNo;
    /**
     * @var string
     */
    private $gate;
    /**
     * @var string
     */
    private $seat;
    /**
     * @var string
     */
    private $baggage;

    /**
     * @return string
     */
    public function getFlightNo(): string
    {
        return $this->flightNo;
    }

    /**
     * @param string $flightNo
     * @return FlightBoardingCard
     */
    public function setFlightNo(string $flightNo): FlightBoardingCard
    {
        $this->flightNo = $flightNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getGate(): string
    {
        return $this->gate;
    }

    /**
     * @param string $gate
     * @return FlightBoardingCard
     */
    public function setGate(string $gate): FlightBoardingCard
    {
        $this->gate = $gate;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }

    /**
     * @param string $seat
     * @return FlightBoardingCard
     */
    public function setSeat(string $seat): FlightBoardingCard
    {
        $this->seat = $seat;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaggage(): string
    {
        return $this->baggage;
    }

    /**
     * @param string $baggage
     * @return FlightBoardingCard
     */
    public function setBaggage(string $baggage): FlightBoardingCard
    {
        $this->baggage = $baggage;
        return $this;
    }


    /**
     * @return string
     */
    function __toString(): string
    {
        return "From $this->from, take flight $this->flightNo to $this->to. Gate $this->gate, seat $this->seat.";
    }
}