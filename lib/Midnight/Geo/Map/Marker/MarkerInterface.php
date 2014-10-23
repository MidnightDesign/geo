<?php

namespace Midnight\Geo\Map\Marker;

use Midnight\Geo\LatLngInterface;

interface MarkerInterface
{
    /**
     * @return LatLngInterface
     */
    public function getPosition();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getInfoWindowContent();
}
