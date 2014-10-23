<?php

namespace Midnight\Geo\Map;

use Midnight\Geo\LatLng;
use Midnight\Geo\LatLngInterface;
use Midnight\Geo\Map\Marker\Marker;
use Midnight\Geo\Map\Marker\MarkerInterface;

class Map implements MapInterface
{
    /**
     * @var LatLng
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

    /**
     * @param LatLngInterface $center
     */
    public function __construct(LatLngInterface $center = null)
    {
        if (!is_null($center)) {
            $this->center = $center;
        }
        if (is_null($this->center)) {
            $this->center = new LatLng();
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
     * @return LatLng
     */
    public function getCenter()
    {
        return $this->center;
    }

    /**
     * @param LatLng $center
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
     * @return MarkerInterface[]
     */
    public function getMarkers()
    {
        return $this->makers;
    }
}
