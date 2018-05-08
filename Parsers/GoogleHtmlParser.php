<?php

namespace Parsers;

use Models\GoogleResult;

require_once __DIR__ . "/HtmlParser.php";
require_once __DIR__ . "/../Models/GoogleResult.php";

/**
 * Google Search Page Parser
 *
 */
class GoogleHtmlParser extends HtmlParser
{
    /**
     * Strategy to get the elements from the Google Search page:
     *
     * First of all, we need to get all the organic results. They are under the h3 header. We can't assume
     * that all h3 tags are results, so we'll validate then
     *
     *
     * Doing a simple regex and count the result will return wrong results since it appears several
     * times in every result
     *
     * @param \DOMDocument $doc
     * @return GoogleResult[]
     */
    public function filter($doc)
    {
        $results = [];
        $regular_nodes = $doc->getElementsByTagName('h3');
        foreach ($regular_nodes as $node) {
            $kids = $node->childNodes;
            foreach ($kids as $kid) {
                if ($kid instanceof \DOMElement) {
                    $results[] = $kid;
                }
            }
        }

        return $results;
    }

    /**
     * @param \DOMElement $element
     * @return bool
     */
    public function validate($element)
    {
        if (!$element instanceof \DOMElement) {
            return false;
        }

        $link = !empty($element->getAttributeNode('href')->value) ?: null;
        $title = !empty($element->nodeValue) ?: null;

        if (!$link || !$title) {
            return false;
        }

        return true;
    }


    /**
     * @param \DOMElement $element
     * @return string | null
     */
    protected function getTitle(\DOMElement $element)
    {
        return $element->nodeValue ?: null;
    }

    /**
     * Google doesn't have the link directly, it has something as
     * /url?q={THE ACTUAL URL}&.....
     * so we'll try to get that part
     * @param \DOMElement $element
     * @return string | null
     */
    protected function getLink(\DOMElement $element)
    {
        $url = $element->getAttributeNode('href')->value ?: null;
        $parsed = parse_url($url);
        if (!empty($parsed) && !empty($parsed['path']) && $parsed['path'] == '/url' && !empty($parsed['query'])) {
            $url = $parsed['query'];
            $parameters = explode('&', $url);
            foreach ($parameters as $param) {
                $components = explode('=', $param);
                if ($components[0] == 'q') {
                    return $components[1];
                }
            }
        }

        return $url;
    }

    /**
     * @param \DOMElement $element
     * @return GoogleResult
     */
    public function parseElement($element)
    {
        //Build the result
        $result = new GoogleResult();
        $result->setTitle($this->getTitle($element));
        $result->setLink($this->getLink($element));

        return $result;
    }
}
