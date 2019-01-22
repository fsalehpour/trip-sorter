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

    /**
     * @test
     */
    public function it_sorts_a_given_array_of_boarding_cards_comprising_a_circuit() {
        $set = [
            new BoardingCard('Stockholm', 'New York'),
            new BoardingCard('Barcelona', 'Gerona'),
            new BoardingCard('New York', 'Barcelona'),
            new BoardingCard('Madrid', 'Stockholm'),
            new BoardingCard('Gerona', 'Madrid'),
        ];
        $expected = [
            new BoardingCard('Stockholm', 'New York'),
            new BoardingCard('New York', 'Barcelona'),
            new BoardingCard('Barcelona', 'Gerona'),
            new BoardingCard('Gerona', 'Madrid'),
            new BoardingCard('Madrid', 'Stockholm'),
        ];

        $sorter = new Sorter($set);
        $this->assertEquals($expected, $sorter->sort());
    }

    /**
     * @test
     */
    public function it_sorts_a_path_with_recurring_city() {
        $set = [
            new BoardingCard('Madrid', 'Barcelona'),
            new BoardingCard('Stockholm', 'Barcelona'),
            new BoardingCard('Barcelona', 'New York'),
            new BoardingCard('Gerona', 'Stockholm'),
            new BoardingCard('Barcelona', 'Gerona'),
        ];
        $expected = [
            new BoardingCard('Madrid', 'Barcelona'),
            new BoardingCard('Barcelona', 'Gerona'),
            new BoardingCard('Gerona', 'Stockholm'),
            new BoardingCard('Stockholm', 'Barcelona'),
            new BoardingCard('Barcelona', 'New York'),
        ];

        $sorter = new Sorter($set);
        $this->assertEquals($expected, $sorter->sort());
    }

    /**
     * @test
     */
    public function it_sorts_a_circuit_with_recurring_city() {
        $set = [
            new BoardingCard('Gerona', 'Madrid'),
            new BoardingCard('Stockholm', 'New York'),
            new BoardingCard('Madrid', 'Barcelona'),
            new BoardingCard('Gerona', 'Stockholm'),
            new BoardingCard('New York', 'Gerona'),
            new BoardingCard('Barcelona', 'Gerona'),
        ];
        $expected = [
            new BoardingCard('Gerona', 'Stockholm'),
            new BoardingCard('Stockholm', 'New York'),
            new BoardingCard('New York', 'Gerona'),
            new BoardingCard('Gerona', 'Madrid'),
            new BoardingCard('Madrid', 'Barcelona'),
            new BoardingCard('Barcelona', 'Gerona'),
        ];

        $sorter = new Sorter($set);
        $this->assertEquals($expected, $sorter->sort());
    }
}
