<?php

/*
 * This file is made to test the GoogleHtmlParser model
 */

namespace tests;

require_once __DIR__ . "/../../../../Parsers/Parser.php";
require_once __DIR__ . "/../PHPUnitUtil.php";


use Models\GoogleResult;
use Models\YahooResult;
use Parsers\GoogleHtmlParser;
use Parsers\Parser;
use Parsers\YahooHtmlParser;
use PHPUnit\Framework\TestCase;
use tests\phpunit\unit\PHPUnitUtil;

/**
 * Class ParserMock. We need to test it like this because it's an abstract class
 *
 * @package tests
 */
class ParserMock extends Parser
{
    /**
     * It's public to not create set/get methods and keep the signature of the mock object
     * as the original
     * @var \DOMElement[]
     */
    public $mocked_elements;

    /**
     * @var $counter;
     */
    protected $counter = 0;

    /**
     * Mocked function
     * @param mixed $raw_data
     * @return mixed
     */
    protected function parseFormat(string $raw_data)
    {
        return $this->mocked_elements;
    }

    /**
     * Mocked function
     * @param mixed $raw_objects
     * @return mixed
     */
    protected function filter($raw_objects)
    {
        array_pop($raw_objects);
        return $raw_objects;
    }

    /**
     * Mocked function
     * @param mixed $element
     * @return boolean
     * @throws \Exception
     */
    protected function validate($element)
    {
        if ($this->counter == 0) {
            $this->counter++;
            return true;
        } else if ($this->counter == 1) {
            $this->counter++;
            return false;
        } else {
            throw new \Exception('Something went wrong');
        }
    }

    /**
     * Mocked function
     * @param mixed $element
     * @return Result
     */
    protected function parseElement($element)
    {
        return $element;
    }
}


class ParserUnitTest extends TestCase
{
    /**
     * @covers \Parsers\Parser::parse
     */
    public function testParseElement()
    {
        $parser = new ParserMock();

        $parsed = $this->getMockBuilder(\DOMElement::class)->disableOriginalConstructor()->getMock();
        $parsed2 = $this->getMockBuilder(\DOMElement::class)->disableOriginalConstructor()->getMock();
        $parsed3 = $this->getMockBuilder(\DOMElement::class)->disableOriginalConstructor()->getMock();
        $parsed4 = $this->getMockBuilder(\DOMElement::class)->disableOriginalConstructor()->getMock();

        $input = 'HTML Code';
        $raw_elements = [$parsed, $parsed2, $parsed3, $parsed4];
        $filtered = [$parsed, $parsed2, $parsed3];
        $parser->mocked_elements = $raw_elements;
        $result = $parser->parse($input);

        $this->assertEquals(count($result), 1);
        $this->assertEquals($result[0], $parsed);
    }
}