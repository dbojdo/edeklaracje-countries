<?php

namespace Webit\EDeklaracje\Countries;

abstract class AbstractDirectory implements Directory
{
    /** @var Country[] */
    private $countries;

    /**
     * @param Country[] $countries
     */
    public function __construct(array $countries)
    {
        $this->countries = array();
        foreach ($countries as $country) {
            $this->countries[$this->normaliseIndex($this->index($country))] = $country;
        }
    }

    /**
     * @param Country $country
     * @return string
     */
    abstract protected function index(Country $country);

    private function normaliseIndex($index)
    {
        return mb_strtoupper($index);
    }

    /**
     * @param string $index
     * @return null|Country
     */
    public function lookup($index)
    {
        $index = $this->normaliseIndex($index);
        if (isset($this->countries[$index])) {
            return $this->countries[$index];
        }

        return null;
    }
}
