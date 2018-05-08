<?php

/*
 * This file is made to test the GoogleHtmlParser model
 */

namespace tests;

require_once __DIR__ . "/../../../../Parsers/GoogleHtmlParser.php";
require_once __DIR__ . "/../PHPUnitUtil.php";


use Models\GoogleResult;
use Parsers\GoogleHtmlParser;
use PHPUnit\Framework\TestCase;
use tests\phpunit\unit\PHPUnitUtil;


class GoogleHtmlParserUnitTest extends TestCase
{
    /**
     * @covers \Parsers\GoogleHtmlParser::parseElement
     */
    public function testParseElement()
    {
        $parser = $this->getMockBuilder(GoogleHtmlParser::class)
            ->setMethods(['getTitle', 'getLink'])
            ->disableOriginalConstructor()
            ->getMock();

        $element = $this->getMockBuilder(\DOMElement::class)->disableOriginalConstructor()->getMock();

        $parser->expects($this->once())->method('getTitle')->with($element)->will($this->returnValue('Result title'));
        $parser->expects($this->once())->method('getLink')->with($element)->will($this->returnValue('https://www.test.com'));

        $result = PHPUnitUtil::invoke($parser, 'parseElement', [$element]);

        $this->assertInstanceOf(GoogleResult::class, $result);
        $this->assertEquals($result->getTitle(), 'Result title');
        $this->assertEquals($result->getLink(), 'https://www.test.com');
    }


}