<?php

namespace Parsers;

require_once __DIR__ . '/Parser.php';

/**
 * Class HtmlParser. It follows the template pattern
 * @package Parsers
 */
abstract class HtmlParser extends Parser
{
    /**
     * @param string $data
     * @return \DOMDocument
     * @throws \Exception
     */
    public function parseFormat(string $data)
    {
        $doc = new \DOMDocument();
        //Hack alert! Dom doesn't play well with HTML5 (lame), so that's why we are
        //disabling warning here. We are handling failures just below
        $success = @$doc->loadHTML($data);

        if (!$success) {
            throw new \Exception('Failed to parse HTML response');
        }

        return $doc;
    }
}
