<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 21:31
 */

namespace TripSorter\Test;

use PHPUnit\Framework\TestCase;
use TripSorter\Sorter;
use TripSorter\Test\Helpers\Edge;

class SorterTest extends TestCase
{
    /**
     * @test
     */
    public function it_sorts_a_given_array_of_boarding_cards() {
        $set = [
            new Edge('Stockholm', 'New York'),
            new Edge('Barcelona', 'Girona'),
            new Edge('New York', 'Barcelona'),
            new Edge('Madrid', 'Stockholm'),
        ];
        $expected = [
            new Edge('Madrid', 'Stockholm'),
            new Edge('Stockholm', 'New York'),
            new Edge('New York', 'Barcelona'),
            new Edge('Barcelona', 'Girona'),
        ];

        $sorter = new Sorter($set);
        $this->assertEquals($expected, $sorter->sort());
    }

    /**
     * @test
     */
    public function it_sorts_a_given_array_of_boarding_cards_comprising_a_circuit() {
        $set = [
            new Edge('Stockholm', 'New York'),
            new Edge('Barcelona', 'Girona'),
            new Edge('New York', 'Barcelona'),
            new Edge('Madrid', 'Stockholm'),
            new Edge('Girona', 'Madrid'),
        ];
        $expected = [
            new Edge('Stockholm', 'New York'),
            new Edge('New York', 'Barcelona'),
            new Edge('Barcelona', 'Girona'),
            new Edge('Girona', 'Madrid'),
            new Edge('Madrid', 'Stockholm'),
        ];

        $sorter = new Sorter($set);
        $this->assertEquals($expected, $sorter->sort());
    }

    /**
     * @test
     */
    public function it_sorts_a_path_with_recurring_city() {
        $set = [
            new Edge('Madrid', 'Barcelona'),
            new Edge('Stockholm', 'Barcelona'),
            new Edge('Barcelona', 'New York'),
            new Edge('Girona', 'Stockholm'),
            new Edge('Barcelona', 'Girona'),
        ];
        $expected = [
            new Edge('Madrid', 'Barcelona'),
            new Edge('Barcelona', 'Girona'),
            new Edge('Girona', 'Stockholm'),
            new Edge('Stockholm', 'Barcelona'),
            new Edge('Barcelona', 'New York'),
        ];

        $sorter = new Sorter($set);
        $this->assertEquals($expected, $sorter->sort());
    }

    /**
     * @test
     */
    public function it_sorts_a_circuit_with_recurring_city() {
        $set = [
            new Edge('Girona', 'Madrid'),
            new Edge('Stockholm', 'New York'),
            new Edge('Madrid', 'Barcelona'),
            new Edge('Girona', 'Stockholm'),
            new Edge('New York', 'Girona'),
            new Edge('Barcelona', 'Girona'),
        ];
        $expected = [
            new Edge('Girona', 'Stockholm'),
            new Edge('Stockholm', 'New York'),
            new Edge('New York', 'Girona'),
            new Edge('Girona', 'Madrid'),
            new Edge('Madrid', 'Barcelona'),
            new Edge('Barcelona', 'Girona'),
        ];

        $sorter = new Sorter($set);
        $this->assertEquals($expected, $sorter->sort());
    }

    /**
     * @test
     * @expectedException \TripSorter\Exceptions\PathCannotBeMadeException
     */
    public function it_throws_exception_when_a_path_cannot_be_made() {
        $set = [
            new Edge('New York', 'Stockholm'),
            new Edge('Barcelona', 'Girona'),
            new Edge('New York', 'Barcelona'),
            new Edge('Madrid', 'Stockholm'),
        ];

        $sorter = new Sorter($set);
        $sorter->sort();
    }
}
