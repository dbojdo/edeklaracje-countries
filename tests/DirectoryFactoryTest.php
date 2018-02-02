<?php

namespace Webit\EDeklaracje\Countries;

use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Webit\EDeklaracje\Countries\Loader\Loader;

class DirectoryFactoryTest extends TestCase
{
    /** @var Loader|ObjectProphecy */
    private $loader;

    /** @var DirectoryFactory */
    private $factory;

    protected function setUp()
    {
        $this->loader = $this->prophesize('Webit\EDeklaracje\Countries\Loader\Loader');
        $this->factory = new DirectoryFactory($this->loader->reveal());
    }

    /**
     * @test
     */
    public function it_creates_directory_by_code()
    {
        $this->loader->load()->willReturn($this->countries());

        $this->assertInstanceOf('Webit\EDeklaracje\Countries\ByCodeDirectory', $this->factory->createByCode());
    }

    /**
     * @test
     */
    public function it_creates_directory_by_name()
    {
        $this->loader->load()->willReturn($this->countries());

        $this->assertInstanceOf('Webit\EDeklaracje\Countries\ByNameDirectory', $this->factory->createByName());
    }

    private function countries()
    {
        return array(
            new Country('PL', 'POLSKA'),
            new Country('GB', 'WIELKA BRYTANIA'),
        );
    }
}