<?php

namespace Midnight\Geo\Map\Renderer;

use Midnight\Geo\Map\Map;

/**
 * Class StaticMapRenderer
 *
 * @package Midnight\Geo\Map\Renderer
 */
class StaticMapRenderer implements MapRenderer
{
    const ADDRESS = 'http://maps.googleapis.com/maps/api/staticmap';
    /**
     * @var int
     */
    private $width = 400;
    /**
     * @var int
     */
    private $height = 400;
    /**
     * @var Map
     */
    private $map;
    /**
     * @var bool
     */
    private $link = true;

    /**
     * @param Map $map
     *
     * @return string
     */
    public function render(Map $map)
    {
        $r = '';
        $this->setMap($map);
        $openLink = $closeLink = '';
        if ($this->getLink()) {
            $markers = $this->getMap()->getMakers();
            if (count($this->getMarkers()) !== 1) {
                throw new \Exception('Can\'t render a map link if there is more than one marker. You can Switch off link rendering by calling setLink(false).');
            }
            $position = $markers[0]->getPosition();
            $openLink = '<a href="http://maps.google.com/?q=' . urlencode(
                    (string)$position->getLatitude() . ',' . (string)$position->getLongitude()
                ) . '" target="_blank">';
            $closeLink = '</a>';
        }
        $r .= $openLink . '<img src="' . $this->getUrl($map) . '" />' . $closeLink;
        return $r;
    }

    /**
     * @param Map $map
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->getPrefix() . '?' . $this->getQuery();
    }

    /**
     * @return \Midnight\Geo\Map\Map
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param \Midnight\Geo\Map\Map $map
     */
    public function setMap($map)
    {
        $this->map = $map;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return bool
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param bool $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    protected function getPrefix()
    {
        return self::ADDRESS;
    }

    private function getQuery()
    {
        $attributes = $this->getAttributes();
        $attributePairs = array();
        foreach ($attributes as $attribute => $value) {
            if (!is_null($value)) {
                $attributePairs[] = $attribute . '=' . urlencode($value);
            }
        }
        return join('&', $attributePairs);
    }

    private function getAttributes()
    {
        $map = $this->getMap();
        $attributes = array(
            'center' => $this->getCenter(),
            'markers' => $this->getMarkers(),
            'zoom' => $map->getZoom(),
            'size' => $this->getWidth() . 'x' . $this->getHeight(),
            'sensor' => 'false'
        );
        return $attributes;
    }

    /**
     * @return string
     */
    private function getCenter()
    {
        $center = $this->getMap()->getCenter();
        $lat = (string)$center->getLatitude();
        $lng = (string)$center->getLongitude();
        return $lat . ',' . $lng;
    }

    private function getMarkers()
    {
        $markers = $this->getMap()->getMakers();
        if (count($markers) < 1) {
            return null;
        }
        $markerStrings = array();
        foreach ($markers as $marker) {
            $position = $marker->getPosition();
            $markerStrings[] = (string)$position->getLatitude() . ',' . (string)$position->getLongitude();
        }
        return 'color:green|' . join('|', $markerStrings);
    }
}