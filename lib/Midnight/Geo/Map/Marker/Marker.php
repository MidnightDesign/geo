<?php

namespace Midnight\Geo\Map\Marker;

use Midnight\Geo\LatLng;

class Marker implements MarkerInterface
{
    /**
     * @var LatLng
     */
    private $position;
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $infoWindowContent;

    /**
     * @param LatLng $position
     */
    public function __construct(LatLng $position)
    {
        $this->position = $position;
    }

    /**
     * @return \Midnight\Geo\LatLng
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param \Midnight\Geo\LatLng $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getInfoWindowContent()
    {
        return $this->infoWindowContent;
    }

    /**
     * @param string $infoWindowContent
     */
    public function setInfoWindowContent($infoWindowContent)
    {
        $this->infoWindowContent = $infoWindowContent;
    }
}
