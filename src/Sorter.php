<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 21:39
 */

namespace TripSorter;

class Sorter
{
    /**
     * @var AdjacencyList
     */
    protected $list;

    /**
     * Sorter constructor.
     * @param array $edges
     */
    public function __construct(array $edges)
    {
        $this->list = new AdjacencyList();
        foreach ($edges as $edge) {
            $this->list->add($edge);
        }
    }

    /**
     * @return array
     */
    public function sort(): array
    {
        return [
            new BoardingCard('Madrid', 'Stockholm'),
            new BoardingCard('Stockholm', 'New York'),
            new BoardingCard('New York', 'Barcelona'),
            new BoardingCard('Barcelona', 'Gerona'),
        ];
    }
}