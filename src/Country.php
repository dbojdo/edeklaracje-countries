<?php

namespace Webit\EDeklaracje\Countries;

final class Country
{
    /** @var string */
    private $code;

    /** @var string */
    private $name;

    /**
     * @param string $code
     * @param string $name
     */
    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->code;
    }
}