<?php

namespace Midnight\Geo\Map\Marker;

use Midnight\Geo\Coordinates;

class Marker
{
    /**
     * @var Coordinates
     */
    private $position;

    function __construct($position)
    {
        $this->position = $position;
    }

    /**
     * @return \Midnight\Geo\Coordinates
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param \Midnight\Geo\Coordinates $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
}