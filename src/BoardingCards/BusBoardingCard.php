<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 01:46
 */

namespace TripSorter\BoardingCards;


class BusBoardingCard extends AbstractBoardingCard
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $seat;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BusBoardingCard
     */
    public function setName(string $name): BusBoardingCard
    {
        $this->name = $name;
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
     * @return BusBoardingCard
     */
    public function setSeat(string $seat): BusBoardingCard
    {
        $this->seat = $seat;
        return $this;
    }


    /**
     * @return string
     */
    function __toString(): string
    {
        return "Take $this->name from $this->from to $this->to. " .
            ($this->seat ? "Sit in seat $this->seat." : "No seat assignment.");
    }
}