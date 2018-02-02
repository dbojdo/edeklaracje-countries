<?php

namespace Webit\EDeklaracje\Countries\Loader;

use Webit\EDeklaracje\Countries\Country;

interface Loader
{
    /**
     * @return Country[]
     */
    public function load();
}
