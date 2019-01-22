<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 21:51
 */

use TripSorter\AdjacencyList;
use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCard;

class AdjacencyListTest extends TestCase
{
    /**
     * @test
     */
    public function it_adds_a_given_edge_to_the_list() {
        $list = new AdjacencyList();
        $list->add(new BoardingCard("A", "B"));
        $expected = [new BoardingCard("A", "B")];
        $this->assertEquals($expected, $list->getNeighbours("A"));
    }
}
