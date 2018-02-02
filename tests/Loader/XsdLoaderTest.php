<?php

namespace Webit\EDeklaracje\Countries\Loader;

use PHPUnit\Framework\TestCase;
use Webit\EDeklaracje\Countries\Country;

class XsdLoaderTest extends TestCase
{
    /**
     * @test
     */
    public function it_loads_countries_from_xsd_file()
    {
        $loader = new XsdLoader(__DIR__.'/resources/KodyKrajow_v3-0.xsd');

        $this->assertEquals(
            array(
                new Country('AF', 'AFGANISTAN'),
                new Country('AX', 'ALAND ISLAND'),
                new Country('AL', 'ALBANIA'),
                new Country('DZ', 'ALGIERIA')
            ),
            $loader->load()
        );
    }

    /**
     * @test
     * @expectedException \Webit\EDeklaracje\Countries\Loader\Exception\XmlFileLoadingException
     */
    public function it_throws_exception_if_cannot_load_a_file()
    {
        $loader = new XsdLoader(__DIR__.'/resources/non-existent-file.xsd');
        $loader->load();
    }
}
