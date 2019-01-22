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
        $to = $edge->getTo();
        $this->list[$from] = $this->list[$from] ?: [];
        $this->list[$to] = $this->list[$to] ?: [];
        array_push($this->list[$from], $edge);
    }

    public function getNeighbours(string $vertex): array
    {
        return $this->list[$vertex];
    }

    public function getVertices(): array
    {
        return array_keys($this->list);
    }

}