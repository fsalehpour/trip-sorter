<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 11:20
 */

/**
 * Example: not sortable
 */

use TripSorter\BoardingCardFormatter;
use TripSorter\BoardingCards\BusBoardingCard;
use TripSorter\BoardingCards\FlightBoardingCard;
use TripSorter\BoardingCards\TrainBoardingCard;
use TripSorter\Exceptions\PathCannotBeMadeException;
use TripSorter\Sorter;
use TripSorter\Util\AdjacencyList;

require_once __DIR__ . '/../vendor/autoload.php';

$cards = [
    (new FlightBoardingCard())
        ->setFlightNo('SK455')
        ->setFrom('Girona Airport')
        ->setTo('Stockholm')
        ->setGate('45B')
        ->setSeat('3A')
        ->setBaggage('Baggage drop at ticket counter 344.'),

    (new BusBoardingCard())
        ->setName('the airport bus')
        ->setFrom('Girona Airport')
        ->setTo('Barcelona'),

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

$sorter = new Sorter(AdjacencyList::createFromArray($cards));
try {
    echo BoardingCardFormatter::cardsToPlainText($sorter->sort());
} catch (PathCannotBeMadeException $e) {
    echo "The given stack is not sortable\n";
}
