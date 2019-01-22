<?php
/**
 * Created by PhpStorm.
 * User: faramarz
 * Date: 22/1/19
 * Time: 21:45
 */

namespace TripSorter;


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
     * AdjacencyList constructor.
     */
    public function __construct()
    {
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
}