<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 11:20
 */

/**
 * Example: circuit with a repeated node
 */

use TripSorter\BoardingCardFormatter;
use TripSorter\BoardingCards\BusBoardingCard;
use TripSorter\BoardingCards\FlightBoardingCard;
use TripSorter\Sorter;
use TripSorter\Util\AdjacencyList;

require_once __DIR__ . '/../vendor/autoload.php';

$cards = [
    (new BusBoardingCard())
        ->setName('9T bus')
        ->setFrom('Girona')
        ->setTo('Madrid'),

    (new FlightBoardingCard())
        ->setFlightNo('SAS256')
        ->setFrom('Stockholm')
        ->setTo('New York')
        ->setGate('N7')
        ->setSeat('10C')
        ->setBaggage('Baggage drop at ticket counter 9.'),

    (new BusBoardingCard())
        ->setName('D17')
        ->setFrom('Madrid')
        ->setTo('Barcelona'),

    (new FlightBoardingCard())
        ->setFlightNo('AL99')
        ->setFrom('Girona')
        ->setTo('Stockholm')
        ->setGate('Y9')
        ->setSeat('3A')
        ->setBaggage('Baggage will be transferred by the airline.'),

    (new FlightBoardingCard())
        ->setFlightNo('UA477')
        ->setFrom('New York')
        ->setTo('Girona')
        ->setGate('3Z')
        ->setSeat('4D')
        ->setBaggage('Claim your baggage at CV4.'),

    (new BusBoardingCard())
        ->setName('BG49')
        ->setFrom('Barcelona')
        ->setTo('Girona'),
];

$sorter = new Sorter(AdjacencyList::createFromArray($cards));
echo BoardingCardFormatter::cardsToPlainText($sorter->sort());
