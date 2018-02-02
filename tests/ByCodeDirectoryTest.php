<?php

namespace Webit\EDeklaracje\Countries;

use PHPUnit\Framework\TestCase;

class ByCodeDirectoryTest extends TestCase
{
    /** @var ByCodeDirectory */
    private $directory;

    protected function setUp()
    {
        $this->directory = new ByCodeDirectory(
            array(
                $this->country(),
            )
        );
    }

    /**
     * @param string $code
     * @param Country|null $expectedCountry
     * @test
     * @dataProvider examples
     */
    public function it_lookup_country_by_code($code, Country $expectedCountry = null)
    {
        $this->assertEquals($expectedCountry, $this->directory->lookup($code));
    }

    public function examples()
    {
        $country = $this->country();
        return array(
            'uppercase' => array(strtoupper($country->code()), $country),
            'lowercase' => array(strtolower($country->code()), $country),
            'mixedcase' => array(lcfirst(strtoupper($country->code())), $country),
            'no-match' => array('xx', null)
        );
    }

    private function country()
    {
        return new Country('PL', 'Polska');
    }
}