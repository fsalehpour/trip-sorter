<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 21:31
 */

use TripSorter\BoardingCard;
use TripSorter\Sorter;
use PHPUnit\Framework\TestCase;

class SorterTest extends TestCase
{
    /**
     * @test
     */
    public function it_sorts_a_given_array_of_boarding_cards() {
        $set = [
            new BoardingCard('Stockholm', 'New York'),
            new BoardingCard('Barcelona', 'Gerona'),
            new BoardingCard('New York', 'Barcelona'),
            new BoardingCard('Madrid', 'Stockholm'),
        ];
        $expected = [
            new BoardingCard('Madrid', 'Stockholm'),
            new BoardingCard('Stockholm', 'New York'),
            new BoardingCard('New York', 'Barcelona'),
            new BoardingCard('Barcelona', 'Gerona'),
        ];

        $sorter = new Sorter($set);
        $this->assertEquals($expected, $sorter->sort());
    }
}
