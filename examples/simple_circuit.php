<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 11:20
 */

use TripSorter\BoardingCards\BusBoardingCard;
use TripSorter\BoardingCards\TrainBoardingCard;

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

$sorter = new \TripSorter\Sorter($cards);
echo \TripSorter\BoardingCardFormatter::cardsToPlainText($sorter->sort());
