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
     * Sorter constructor.
     * @param array $edges
     */
    public function __construct(array $edges)
    {
    }

    public function sort()
    {
        return [
            new BoardingCard('Madrid', 'Stockholm'),
            new BoardingCard('Stockholm', 'New York'),
            new BoardingCard('New York', 'Barcelona'),
            new BoardingCard('Barcelona', 'Gerona'),
        ];
    }
}