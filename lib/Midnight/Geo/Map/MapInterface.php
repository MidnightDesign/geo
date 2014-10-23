<?php

namespace Midnight\Geo\Map;

use Midnight\Geo\LatLngInterface;
use Midnight\Geo\Map\Marker\MarkerInterface;

interface MapInterface
{
    /**
     * @return LatLngInterface
     */
    public function getCenter();

    /**
     * @return int
     */
    public function getZoom();

    /**
     * @return MarkerInterface[]
     */
    public function getMarkers();
}
