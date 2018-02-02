<?php

namespace Webit\EDeklaracje\Countries;

final class ByCodeDirectory extends AbstractDirectory
{
    /**
     * @inheritdoc
     */
    protected function index(Country $country)
    {
        return $country->code();
    }
}