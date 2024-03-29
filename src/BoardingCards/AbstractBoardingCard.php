<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 20:50
 */

namespace TripSorter\BoardingCards;

use TripSorter\Util\EdgeInterface;

abstract class AbstractBoardingCard implements EdgeInterface
{
    /**
     * @var string
     */
    protected $from;
    /**
     * @var string
     */
    protected $to;

    /**
     * @param string $from
     * @return AbstractBoardingCard
     */
    public function setFrom(string $from): AbstractBoardingCard
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @param string $to
     * @return AbstractBoardingCard
     */
    public function setTo(string $to): AbstractBoardingCard
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return string
     */
    abstract function __toString(): string;

}