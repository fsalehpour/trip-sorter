<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 02:13
 */

namespace TripSorter\Test;

use TripSorter\BoardingCards\BusBoardingCard;
use PHPUnit\Framework\TestCase;

class BusBoardingCardTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_text_representation_for_a_bus_boarding_card() {
        $card = new BusBoardingCard();
        $card->setName('the airport bus')
            ->setFrom('Barcelona')
            ->setTo('Gerona Airport');

        $expected = 'Take the airport bus from Barcelona to Gerona Airport. No seat assignment.';

        $this->assertEquals($expected, $card->__toString());
    }
}
