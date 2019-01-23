<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 02:01
 */

namespace TripSorter\Test;

use TripSorter\BoardingCards\TrainBoardingCard;
use PHPUnit\Framework\TestCase;

class TrainBoardingCardTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_text_representation_for_a_train_boarding_card() {
        $card = new TrainBoardingCard();
        $card->setTrainNo('78A')
            ->setFrom('Madrid')
            ->setTo('Barcelona')
            ->setSeat('45B');

        $this->assertEquals('Take train 78A from Madrid to Barcelona. Sit in seat 45B.', $card->__toString());
    }
}
