<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 21:39
 */

namespace TripSorter;

use TripSorter\Exceptions\PathCannotBeMadeException;

class Sorter
{
    /**
     * @var AdjacencyList
     */
    protected $list;

    /**
     * Sorter constructor.
     * @param AdjacencyList $list
     */
    public function __construct(AdjacencyList $list)
    {
        $this->list = $list;
    }

    /**
     * @return array
     */
    public function sort(): array
    {
        $stack = [];
        $path = [];
        $current = $this->list->pop($this->findStartNode());

        do {
            if(0 == $this->list->getOutDegree($current->getTo())) {
                array_unshift($path, $current);
                $current = array_pop($stack);
            } else {
                array_push($stack, $current);
                $current = $this->list->pop($current->getTo());
            }
        } while($this->list->getOutDegree($current->getTo()) > 0 || !empty($stack));

        array_unshift($path, $current);

        return $path;
    }

    /**
     * @return mixed
     */
    private function findStartNode()
    {
        $this->checkIfPathExists();
        return count($this->list->getUnevenVertices()) === 0 ? $this->list->getVertices()[0] : $this->findOrigins()[0];
    }

    /**
     * @return array
     */
    private function findOrigins(): array
    {
        $origins = [];
        foreach ($this->list->getVertices() as $vertex) {
            if (1 == $this->list->getOutDegree($vertex) - $this->list->getInDegree($vertex))
                $origins[] = $vertex;
        }
        return $origins;
    }

    /**
     * @throws PathCannotBeMadeException
     * @return void
     */
    private function checkIfPathExists(): void
    {
        $uneven = count($this->list->getUnevenVertices());
        $origins = count($this->findOrigins());

        if ($uneven != 0 && ($uneven != 2 || $origins != 1))
            throw new PathCannotBeMadeException();
    }
}