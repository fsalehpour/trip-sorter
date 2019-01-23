<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 10:21
 */

namespace TripSorter;

use TripSorter\BoardingCards\AbstractBoardingCard;
use TripSorter\BoardingCards\BaggageClaimInterface;

class BoardingCardFormatter
{

    public static function toPlainText(AbstractBoardingCard $card)
    {
        return '- ' . $card->__toString() .
            ($card instanceof BaggageClaimInterface ? "\n- " . $card->getBaggage() : "");
    }

    public static function toHtml(AbstractBoardingCard $card)
    {
        return '<li>' . $card->__toString() . '</li>' .
            ($card instanceof BaggageClaimInterface ? "<li>" . $card->getBaggage() . "</li>" : "");
    }
}