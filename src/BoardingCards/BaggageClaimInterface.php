<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 23/1/19
 * Time: 09:53
 */

namespace TripSorter\BoardingCards;


interface BaggageClaimInterface
{

    /**
     * @return string
     */
    public function getBaggage(): string;
}