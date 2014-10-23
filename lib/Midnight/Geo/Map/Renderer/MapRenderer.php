<?php

namespace Midnight\Geo\Map\Renderer;

use Midnight\Geo\Map\MapInterface;

interface MapRenderer
{
    public function render(MapInterface $map);
}
