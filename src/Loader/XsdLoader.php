<?php

namespace Webit\EDeklaracje\Countries\Loader;

use Webit\EDeklaracje\Countries\Country;
use Webit\EDeklaracje\Countries\Loader\Exception\XmlFileLoadingException;

final class XsdLoader implements Loader
{
    /** @var string */
    private $filename;

    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @inheritdoc
     */
    public function load()
    {
        $xml = @simplexml_load_file($this->filename);
        if (!$xml) {
            throw new XmlFileLoadingException(
                sprintf('Could not load the source XML file "%s".', $this->filename)
            );
        }

        $countries = array();
        foreach ($this->countriesList($xml) as $c) {
            $countries[] = new Country($this->extractCode($c), $this->extractName($c));
        }

        return $countries;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return \SimpleXMLElement
     */
    private function countriesList(\SimpleXMLElement $xml)
    {
        $children = $xml->children('http://www.w3.org/2001/XMLSchema');
        return $children->simpleType->restriction->enumeration;
    }

    /**
     * @param \SimpleXMLElement $c
     * @return string
     */
    private function extractCode(\SimpleXMLElement $c)
    {
        return (string)@$c[0]->attributes()['value'];
    }

    /**
     * @param \SimpleXMLElement $c
     * @return string
     */
    private function extractName(\SimpleXMLElement $c)
    {
        return (string)@$c->annotation->documentation;
    }
}
