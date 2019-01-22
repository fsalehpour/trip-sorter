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
     * @param array $edges
     */
    public function __construct(array $edges)
    {
        $this->list = new AdjacencyList();
        foreach ($edges as $edge) {
            $this->list->add($edge);
        }
    }

    /**
     * @return array
     */
    public function sort(): array
    {
        $start = null;
        $stack = [];
        $path = [];
        $odds = 0;
        $candidates = [];

        foreach ($this->list->getVertices() as $vertex) {
            if ($this->list->getInDegree($vertex) == $this->list->getOutDegree($vertex))
                continue;
            $odds++;
            if ($this->list->getInDegree($vertex) + 1 == $this->list->getOutDegree($vertex))
                $candidates[] = $vertex;
        }

        if ($odds == 0)
            $start = $this->list->getVertices()[0];
        else if ($odds == 2 && count($candidates) == 1)
            $start = $candidates[0];
        else
            throw new PathCannotBeMadeException();

        $current = $this->list->pop($start);

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
}