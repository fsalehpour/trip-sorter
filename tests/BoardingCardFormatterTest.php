<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 10:21
 */

namespace TripSorter\Test;

use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCardFormatter;
use TripSorter\BoardingCards\FlightBoardingCard;
use TripSorter\BoardingCards\TrainBoardingCard;

class BoardingCardFormatterTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_text_for_a_boarding_card()
    {
        $card = new TrainBoardingCard();
        $card->setTrainNo('78A')
            ->setFrom('Madrid')
            ->setTo('Barcelona')
            ->setSeat('45B');

        $this->assertEquals('- Take train 78A from Madrid to Barcelona. Sit in seat 45B.', BoardingCardFormatter::toPlainText($card));
    }

    /**
     * @test
     */
    public function it_returns_text_for_a_boarding_card_implementing_baggage()
    {
        $card = new FlightBoardingCard();
        $baggage = 'Baggage drop at ticket counter 344.';
        $card->setFlightNo('SK455')
            ->setFrom('Girona Airport')
            ->setTo('Stockholm')
            ->setGate('45B')
            ->setSeat('3A')
            ->setBaggage($baggage);

        $this->assertEquals(
            '- From Girona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.' . "\n" .
            "- Baggage drop at ticket counter 344."
            ,
            BoardingCardFormatter::toPlainText($card));
    }

    /**
     * @test
     */
    public function it_returns_html_for_a_boarding_card()
    {
        $card = new TrainBoardingCard();
        $card->setTrainNo('78A')
            ->setFrom('Madrid')
            ->setTo('Barcelona')
            ->setSeat('45B');

        $this->assertEquals(
            '<li>Take train 78A from Madrid to Barcelona. Sit in seat 45B.</li>',
            BoardingCardFormatter::toHtml($card));
    }

    /**
     * @test
     */
    public function it_returns_html_for_a_boarding_card_implementing_baggage()
    {
        $card = new FlightBoardingCard();
        $baggage = 'Baggage drop at ticket counter 344.';
        $card->setFlightNo('SK455')
            ->setFrom('Girona Airport')
            ->setTo('Stockholm')
            ->setGate('45B')
            ->setSeat('3A')
            ->setBaggage($baggage);

        $this->assertEquals(
            '<li>From Girona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.</li>' .
            "<li>Baggage drop at ticket counter 344.</li>",
            BoardingCardFormatter::toHtml($card));
    }

    /**
     * @test
     */
    public function it_returns_text_for_a_list_of_given_cards()
    {
        $cards = [
            (new FlightBoardingCard())
                ->setFlightNo('SK455')
                ->setFrom('Girona Airport')
                ->setTo('Stockholm')
                ->setGate('45B')
                ->setSeat('3A')
                ->setBaggage('Baggage drop at ticket counter 344.'),
            (new TrainBoardingCard())
                ->setTrainNo('78A')
                ->setFrom('Madrid')
                ->setTo('Barcelona')
                ->setSeat('45B'),
        ];

        $expected =
            '- From Girona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.' . "\n" .
            '- Baggage drop at ticket counter 344.' . "\n" .
            '- Take train 78A from Madrid to Barcelona. Sit in seat 45B.' . "\n" .
            '- You have arrived at your final destination.';

        $this->assertEquals($expected, BoardingCardFormatter::cardsToPlainText($cards));
    }

    /**
     * @test
     */
    public function it_returns_html_list_for_a_list_of_given_cards()
    {
        $cards = [
            (new FlightBoardingCard())
                ->setFlightNo('SK455')
                ->setFrom('Girona Airport')
                ->setTo('Stockholm')
                ->setGate('45B')
                ->setSeat('3A')
                ->setBaggage('Baggage drop at ticket counter 344.'),
            (new TrainBoardingCard())
                ->setTrainNo('78A')
                ->setFrom('Madrid')
                ->setTo('Barcelona')
                ->setSeat('45B'),
        ];

        $expected =
            '<li>From Girona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.</li>' .
            '<li>Baggage drop at ticket counter 344.</li>' .
            '<li>Take train 78A from Madrid to Barcelona. Sit in seat 45B.</li>'.
            '<li>You have arrived at your final destination.</li>';
        $this->assertEquals($expected, BoardingCardFormatter::cardsToHtml($cards));
    }

}
