<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 21:52
 */

namespace TripSorter;


interface EdgeInterface
{

    /**
     * @return string
     */
    public function getFrom(): string;

    /**
     * @return string
     */
    public function getTo(): string;
}