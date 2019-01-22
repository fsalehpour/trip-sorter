<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 21:45
 */

namespace TripSorter;


class AdjacencyList
{
    protected $list;

    /**
     * AdjacencyList constructor.
     */
    public function __construct()
    {
    }

    public function add(BoardingCard $edge)
    {
        $from = $edge->getFrom();
        $this->list[$from] = $this->list[$from] ?: [];
        array_push($this->list[$from], $edge);
    }

    public function getNeighbours(string $vertex): array
    {
        return $this->list[$vertex];
    }


}