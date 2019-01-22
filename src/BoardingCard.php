<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 20:50
 */

namespace TripSorter;


class BoardingCard implements EdgeInterface
{
    /**
     * @var string
     */
    private $from;
    /**
     * @var string
     */
    private $to;

    /**
     * BoardingCard constructor.
     * @param string $from
     * @param string $to
     */
    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
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

}