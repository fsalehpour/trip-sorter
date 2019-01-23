<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 11:20
 */

/**
 * Example: circuit
 */

use TripSorter\AdjacencyList;
use TripSorter\BoardingCardFormatter;
use TripSorter\BoardingCards\BusBoardingCard;
use TripSorter\BoardingCards\TrainBoardingCard;
use TripSorter\Sorter;

require_once __DIR__ . '/../vendor/autoload.php';

$cards = [
    (new BusBoardingCard())
        ->setName('D17')
        ->setFrom('Madrid')
        ->setTo('Barcelona'),

    (new TrainBoardingCard())
        ->setTrainNo('47H')
        ->setFrom('Girona')
        ->setTo('Madrid')
        ->setSeat('J74'),

    (new TrainBoardingCard())
        ->setTrainNo('C9')
        ->setFrom('Barcelona')
        ->setTo('Girona')
        ->setSeat('9X'),
];

$sorter = new Sorter(AdjacencyList::createFromArray($cards));
echo BoardingCardFormatter::cardsToPlainText($sorter->sort());
