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
     * @var
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
     * @return mixed
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param mixed $seat
     * @return BusBoardingCard
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
        return $this;
    }


}