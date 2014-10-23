<?php

namespace Midnight\Geo;

interface LatLngInterface
{
    /**
     * @return float
     */
    public function getLat();

    /**
     * @return float
     */
    public function getLng();
}
