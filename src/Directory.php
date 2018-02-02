<?php

namespace Webit\EDeklaracje\Countries;

interface Directory
{
    /**
     * @param string $index
     * @return Country|null
     */
    public function lookup($index);
}