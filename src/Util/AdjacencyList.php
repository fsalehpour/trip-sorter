<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 21:45
 */

namespace TripSorter\Util;


class AdjacencyList
{
    /**
     * @var array
     */
    protected $list;
    /**
     * @var array
     */
    protected $in;

    /**
     * @param array $edges
     * @return AdjacencyList
     */
    public static function createFromArray(array $edges): AdjacencyList
    {
        $list = new static();
        foreach ($edges as $edge)
            $list->add($edge);
        return $list;
    }

    /**
     * @param EdgeInterface $edge
     */
    public function add(EdgeInterface $edge): void
    {
        $from = $edge->getFrom();
        $to = $edge->getTo();
        $this->list[$from] = $this->list[$from] ?? [];
        $this->list[$to] = $this->list[$to] ?? [];
        $this->in[$from] = $this->in[$from] ?? 0;
        $this->in[$to] = $this->in[$to] ?? 0;
        array_push($this->list[$from], $edge);
        $this->in[$to]++;
    }

    /**
     * @param string $vertex
     * @return array
     */
    public function getNeighbours(string $vertex): array
    {
        return $this->list[$vertex];
    }

    /**
     * @return array
     */
    public function getVertices(): array
    {
        return array_keys($this->list);
    }

    /**
     * @param string $vertex
     * @return int
     */
    public function getOutDegree(string $vertex): int
    {
        return count($this->list[$vertex]);
    }

    /**
     * @param string $vertex
     * @return int
     */
    public function getInDegree(string $vertex): int
    {
        return $this->in[$vertex];
    }

    /**
     * @param string $vertex
     * @return EdgeInterface
     */
    public function pop(string $vertex): EdgeInterface
    {
        return array_pop($this->list[$vertex]);
    }

    /**
     * @return array
     */
    public function getUnevenVertices(): array
    {
        $uneven = [];
        foreach ($this->getVertices() as $v) {
            if ($this->getInDegree($v) != $this->getOutDegree($v))
                $uneven[] = $v;
        }
        return $uneven;
    }
}