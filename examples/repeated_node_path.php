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

    (new BusBoardingCard())
        ->setName('bus 49')
        ->setFrom('Madrid')
        ->setTo('Barcelona'),

    (new FlightBoardingCard())
        ->setFlightNo('SAS190')
        ->setFrom('Stockholm')
        ->setTo('Barcelona')
        ->setGate('21')
        ->setSeat('14C')
        ->setBaggage('Claim baggage at D hall.'),

    (new FlightBoardingCard())
        ->setFlightNo('IBB322')
        ->setFrom('Barcelona')
        ->setTo('New York')
        ->setGate('10')
        ->setSeat('17A')
        ->setBaggage('Baggage will be automatically transferred from your last leg.'),

    (new TrainBoardingCard())
        ->setTrainNo('19M')
        ->setFrom('Girona')
        ->setTo('Stockholm')
        ->setSeat('D73'),

    (new BusBoardingCard())
        ->setName('bus BG13')
        ->setFrom('Barcelona')
        ->setTo('Girona'),

];

$sorter = new \TripSorter\Sorter($cards);
echo \TripSorter\BoardingCardFormatter::cardsToPlainText($sorter->sort());
