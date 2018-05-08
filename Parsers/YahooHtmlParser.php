<?php

namespace Parsers;

use Models\YahooResult;
use Parsers\GoogleHtmlParser;

//require_once __DIR__ . "/GoogleHtmlParser.php";
require_once __DIR__ . "/../Models/YahooResult.php";

/**
 * Yahoo Search Page Parser.
 * HACKER TIP: Yahoo's search uses the same format as the google one. It may or may not be related to the
 * fact that Yahoo's been using Google to power their search engine for a while.
 *
 * If it's on Wikipedia it means that is public information, right? https://en.wikipedia.org/wiki/Yahoo!_Search
 *
 * @author	Juanjo Lainez
 */
class YahooHtmlParser extends GoogleHtmlParser
{
    /**
     * @param \DOMElement $element
     * @return string | null
     */
    protected function getLink(\DOMElement $element)
    {
        return $element->getAttributeNode('href')->value ?: null;
    }

    /**
     * @param \DOMElement $element
     * @return YahooResult
     */
    public function parseElement($element)
    {
        //Build the result
        $result = new YahooResult();
        $result->setTitle($this->getTitle($element));
        $result->setLink($this->getLink($element));

        return $result;
    }
}
