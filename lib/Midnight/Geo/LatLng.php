<?php

namespace Midnight\Geo;

class LatLng implements LatLngInterface
{
    /**
     * @var float
     */
    private $lat = .0;
    /**
     * @var float
     */
    private $lng = .0;

    /**
     * @param float $lat
     * @param float $lng
     */
    public function __construct($lat = .0, $lng = .0)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @return float
     * @deprecated Use getLat()
     */
    public function getLatitude()
    {
        return $this->getLat();
    }

    /**
     * @return float
     * @deprecated Use getLng()
     */
    public function getLongitude()
    {
        return $this->getLng();
    }
}
