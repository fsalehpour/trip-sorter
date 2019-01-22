<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 01:26
 */

namespace TripSorter\Test\Helpers;

use TripSorter\EdgeInterface;

class Edge implements EdgeInterface
{
    /**
     * @var string
     */
    private $to;
    /**
     * @var string
     */
    private $from;

    /**
     * Edge constructor.
     * @param string $from
     * @param string $to
     */
    public function __construct(string $from, string $to)
    {
        $this->to = $to;
        $this->from = $from;
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