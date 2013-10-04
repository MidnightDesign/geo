<?php

namespace Midnight\Geo\Map;

use Midnight\Geo\Coordinates;
use Midnight\Geo\Map\Marker\Marker;

class Map
{
    /**
     * @var Coordinates
     */
    private $center;
    /**
     * @var int
     */
    private $zoom = 14;
    /**
     * @var Marker[]
     */
    private $makers = array();

    function __construct($center = null)
    {
        if (!is_null($center)) {
            $this->center = $center;
        }
        if (is_null($this->center)) {
            $this->center = new Coordinates();
        }
    }

    /**
     * @return int
     */
    public function getZoom()
    {
        return $this->zoom;
    }

    /**
     * @param int $zoom
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }

    /**
     * @return Coordinates
     */
    public function getCenter()
    {
        return $this->center;
    }

    /**
     * @param Coordinates $center
     */
    public function setCenter($center)
    {
        $this->center = $center;
    }

    /**
     * @param Marker $marker
     */
    public function addMarker(Marker $marker)
    {
        $this->makers[] = $marker;
    }

    /**
     * @return Marker[]
     */
    public function getMakers()
    {
        return $this->makers;
    }
}