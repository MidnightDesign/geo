<?php

namespace Midnight\Geo\Map\Renderer;

use Midnight\Geo\Map\Map;

interface MapRenderer
{
    public function render(Map $map);
}