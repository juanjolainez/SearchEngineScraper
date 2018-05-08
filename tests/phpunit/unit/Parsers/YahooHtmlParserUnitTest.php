<?php

/*
 * This file is made to test the GoogleHtmlParser model
 */

namespace tests;

require_once __DIR__ . "/../../../../Parsers/YahooHtmlParser.php";
require_once __DIR__ . "/../PHPUnitUtil.php";


use Models\GoogleResult;
use Models\YahooResult;
use Parsers\GoogleHtmlParser;
use Parsers\YahooHtmlParser;
use PHPUnit\Framework\TestCase;
use tests\phpunit\unit\PHPUnitUtil;


class YahooHtmlParserUnitTest extends TestCase
{
    /**
     * @covers \Parsers\YahooHtmlParser::parseElement
     */
    public function testParseElement()
    {
        $parser = $this->getMockBuilder(YahooHtmlParser::class)
            ->setMethods(['getTitle', 'getLink'])
            ->disableOriginalConstructor()
            ->getMock();

        $element = $this->getMockBuilder(\DOMElement::class)->disableOriginalConstructor()->getMock();

        $parser->expects($this->once())->method('getTitle')->with($element)->will($this->returnValue('Result title'));
        $parser->expects($this->once())->method('getLink')->with($element)->will($this->returnValue('https://www.test.com'));

        $result = PHPUnitUtil::invoke($parser, 'parseElement', [$element]);

        $this->assertInstanceOf(YahooResult::class, $result);
        $this->assertEquals($result->getTitle(), 'Result title');
        $this->assertEquals($result->getLink(), 'https://www.test.com');
    }
}