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
    private const END_OF_JOURNEY = 'You have arrived at your final destination.';

    /**
     * @param AbstractBoardingCard $card
     * @return string
     */
    public static function toPlainText(AbstractBoardingCard $card): string
    {
        return '- ' . $card->__toString() .
            ($card instanceof BaggageClaimInterface ? "\n- " . $card->getBaggage() : "");
    }

    /**
     * @param AbstractBoardingCard $card
     * @return string
     */
    public static function toHtml(AbstractBoardingCard $card): string
    {
        return '<li>' . $card->__toString() . '</li>' .
            ($card instanceof BaggageClaimInterface ? "<li>" . $card->getBaggage() . "</li>" : "");
    }

    /**
     * @param array $cards
     * @return string
     */
    public static function cardsToPlainText(array $cards): string
    {
        $output = [];
        foreach ($cards as $card) {
            $output[] = static::toPlainText($card);
        }
        $output[] = '- ' . static::END_OF_JOURNEY;
        return implode("\n", $output);
    }

    /**
     * @param array $cards
     * @return string
     */
    public static function cardsToHtml(array $cards): string
    {
        $output = "";
        foreach ($cards as $card) {
            $output .= static::toHtml($card);
        }
        $output .= '<li>' . static::END_OF_JOURNEY . '</li>';
        return $output;
    }
}