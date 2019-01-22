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

    /**
     * @test
     */
    public function it_adds_both_sides_of_a_given_edge_to_list() {
        $list = new AdjacencyList();
        $list->add(new BoardingCard("A", "B"));
        $this->assertEquals([], $list->getNeighbours("B"));
    }

    /**
     * @test
     */
    public function it_adds_multiple_edges_to_the_list() {
        $list = new AdjacencyList();
        $list->add(new BoardingCard("A", "B"));
        $list->add(new BoardingCard("A", "C"));
        $expected = [
            new BoardingCard("A", "B"),
            new BoardingCard("A", "C"),
        ];
        $this->assertEquals($expected, $list->getNeighbours("A"));
    }

    /**
     * @test
     */
    public function it_returns_array_of_all_vertices_in_the_list() {
        $list = new AdjacencyList();
        $list->add(new BoardingCard("A", "B"));
        $list->add(new BoardingCard("A", "C"));
        $this->assertEquals(["A","B","C"], $list->getVertices());
    }
}
