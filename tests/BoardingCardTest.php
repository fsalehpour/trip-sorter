<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 20:41
 */

use TripSorter\BoardingCard;
use PHPUnit\Framework\TestCase;

class BoardingCardTest extends TestCase
{
    /**
     * @test
     */
    public function it_sets_from_and_to_in_constructer_and_provides_accessors() {
        $bc = new BoardingCard("Madrid", "Barcelona");
        $this->assertEquals("Madrid", $bc->getFrom());
        $this->assertEquals("Barcelona", $bc->getTo());
    }

}
