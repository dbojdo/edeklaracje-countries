<?php

namespace Webit\EDeklaracje\Countries;

use Webit\EDeklaracje\Countries\Loader\Loader;
use Webit\EDeklaracje\Countries\Loader\XsdLoader;

class DirectoryFactory
{
    /** @var Loader */
    private $loader;

    /**
     * @param Loader $loader
     */
    public function __construct(Loader $loader = null)
    {
        $this->loader = $loader ?: self::defaultLoader();
    }

    /**
     * @return string
     */
    private static function defaultLoader()
    {
        return new XsdLoader(__DIR__ . '/resources/KodyKrajow_v4-1E.xsd');
    }

    /**
     * @return ByCodeDirectory
     */
    public function createByCode()
    {
        return new ByCodeDirectory(
            $this->loader->load()
        );
    }

    /**
     * @return ByNameDirectory
     */
    public function createByName()
    {
        return new ByNameDirectory(
            $this->loader->load()
        );
    }
}
