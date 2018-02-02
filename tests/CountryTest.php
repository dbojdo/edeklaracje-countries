<?php

namespace Webit\EDeklaracje\Countries;

use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    /**
     * @test
     */
    public function it_keeps_code_and_name()
    {
        $country = new Country(
            $code = 'PL',
            $name = 'POLSKA'
        );

        $this->assertEquals($code, $country->code());
        $this->assertEquals($name, $country->name());
    }

    /**
     * @test
     */
    public function it_casts_to_string_as_code()
    {
        $country = new Country(
            $code = 'PL',
            $name = 'POLSKA'
        );

        $this->assertEquals($code, (string)$country);
    }
}