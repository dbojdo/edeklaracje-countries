<?php

namespace Webit\EDeklaracje\Countries;

final class ByNameDirectory extends AbstractDirectory
{
    /**
     * @inheritdoc
     */
    protected function index(Country $country)
    {
        return $country->name();
    }
}