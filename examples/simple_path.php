<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 11:20
 */

use TripSorter\BoardingCards\BusBoardingCard;
use TripSorter\BoardingCards\FlightBoardingCard;
use TripSorter\BoardingCards\TrainBoardingCard;

require_once __DIR__ . '/../vendor/autoload.php';

$cards = [
    (new FlightBoardingCard())
        ->setFlightNo('SK455')
        ->setFrom('Gerona Airport')
        ->setTo('Stockholm')
        ->setGate('45B')
        ->setSeat('3A')
        ->setBaggage('Baggage drop at ticket counter 344.'),

    (new BusBoardingCard())
        ->setName('the airport bus')
        ->setFrom('Barcelona')
        ->setTo('Gerona Airport'),

    (new FlightBoardingCard())
        ->setFlightNo('SK22')
        ->setFrom('Stockholm')
        ->setTo('New York JFK')
        ->setGate('22')
        ->setSeat('7B')
        ->setBaggage('Baggage will be automatically transferred from your last leg.'),

    (new TrainBoardingCard())
        ->setTrainNo('78A')
        ->setFrom('Madrid')
        ->setTo('Barcelona')
        ->setSeat('45B'),
];

$sorter = new \TripSorter\Sorter($cards);
echo \TripSorter\BoardingCardFormatter::cardsToPlainText($sorter->sort());
