<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 02:19
 */

namespace TripSorter\Test;

use TripSorter\BoardingCards\FlightBoardingCard;
use PHPUnit\Framework\TestCase;

class FlightBoardingCardTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_text_representation_for_a_flight_boarding_card() {
        $card = new FlightBoardingCard();
        $baggage = 'Baggage drop at ticket counter 344.';
        $card->setFlightNo('SK455')
            ->setFrom('Girona Airport')
            ->setTo('Stockholm')
            ->setGate('45B')
            ->setSeat('3A')
            ->setBaggage($baggage);

        $this->assertEquals(
            'From Girona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.',
            $card->__toString());
        $this->assertEquals($baggage, $card->getBaggage());
    }
}
