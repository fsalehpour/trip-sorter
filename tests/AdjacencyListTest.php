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

    /**
     * @test
     */
    public function it_returns_out_degree_of_a_vertex() {
        $list = new AdjacencyList();
        $list->add(new BoardingCard("A", "B"));
        $list->add(new BoardingCard("A", "C"));
        $list->add(new BoardingCard("B", "C"));
        $this->assertEquals(2, $list->getOutDegree("A"));
        $this->assertEquals(1, $list->getOutDegree("B"));
        $this->assertEquals(0, $list->getOutDegree("C"));
    }

    /**
     * @test
     */
    public function it_returns_in_degree_of_a_vertex() {
        $list = new AdjacencyList();
        $list->add(new BoardingCard("A", "B"));
        $list->add(new BoardingCard("A", "C"));
        $list->add(new BoardingCard("B", "C"));
        $this->assertEquals(0, $list->getInDegree("A"));
        $this->assertEquals(1, $list->getInDegree("B"));
        $this->assertEquals(2, $list->getInDegree("C"));
    }

    /**
     * @test
     */
    public function it_pops_an_edge_for_a_vertex() {
        $list = new AdjacencyList();
        $list->add(new BoardingCard("A", "B"));
        $list->add(new BoardingCard("A", "C"));
        $list->add(new BoardingCard("B", "C"));
        $this->assertEquals(2, $list->getOutDegree("A"));
        $this->assertEquals(new BoardingCard("A", "C"), $list->pop("A"));
        $this->assertEquals(1, $list->getOutDegree("A"));
    }
}
