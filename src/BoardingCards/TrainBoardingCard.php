<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 01:42
 */

namespace TripSorter\BoardingCards;


class TrainBoardingCard extends AbstractBoardingCard
{
    /**
     * @var string
     */
    private $seat;

    /**
     * @var string
     */
    private $trainNo;

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }

    /**
     * @param string $seat
     * @return TrainBoardingCard
     */
    public function setSeat(string $seat): TrainBoardingCard
    {
        $this->seat = $seat;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrainNo(): string
    {
        return $this->trainNo;
    }

    /**
     * @param string $trainNo
     * @return TrainBoardingCard
     */
    public function setTrainNo(string $trainNo): TrainBoardingCard
    {
        $this->trainNo = $trainNo;
        return $this;
    }


}