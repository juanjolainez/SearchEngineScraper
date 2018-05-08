<?php

/*
 * This file is made to test the GoogleHtmlParser model
 */

namespace tests;

require_once __DIR__ . "/../../../../Parsers/GoogleHtmlParser.php";

use PHPUnit\Framework\TestCase;


class GoogleHtmlParserTest extends TestCase
{

    protected function getExpectedResults()
    {
        return [
            [
                'title' => "Creditorwatch.com.au - CreditorWatch Free Trial",
                'link' => "https://creditorwatch.com.au/"
            ],
            [
                'title' => "CreditorWatch - Business Credit Reports - Company Credit Scores",
                'link' => "https://creditorwatch.com.au/"
            ],
            [
                'title' => "Pricing",
                'link' => "https://creditorwatch.com.au/pricing"
            ],
            [
                'title' => "About Us",
                'link' => "https://creditorwatch.com.au/about-us"
            ],
            [
                'title' => "Perform a credit check on any ...",
                'link' => "https://creditorwatch.com.au/login"
            ],
            [
                'title' => "Contact Us",
                'link' => "https://creditorwatch.com.au/contact"
            ],
            [
                'title' => "CreditorWatch - Wikipedia",
                'link' => "https://en.wikipedia.org/wiki/CreditorWatch"
            ],
            [
                'title' => "CreditorWatch - Home | Facebook",
                'link' => "https://www.facebook.com/CreditorWatch-158362990867063/"
            ],
            [
                'title' => "CreditorWatch | LinkedIn",
                'link' => "https://au.linkedin.com/company/creditor-watch"
            ],
            [
                'title' => "CreditorWatch - SmartCompany",
                'link' => "https://www.smartcompany.com.au/lists/smart50-awards-2017/creditorwatch/"
            ],
            [
                'title' => "CreditorWatch Credit Report | InfoTrack",
                'link' => "https://www.infotrack.com.au/products/company-searches/credit-report/creditorwatch/"
            ],
            [
                'title' => "Search provider InfoTrack buys CreditorWatch | afr.com",
                'link' => "http://www.afr.com/technology/search-provider-infotrack-buys-creditorwatch-20171005-gyuod8"
            ],
            [
                'title' => "CreditorWatch - Debt Collectors | Brisbane, Sydney & Melbourne | NCS",
                'link' => "http://www.natcollection.com.au/creditorwatch/"
            ],
        ];
    }

    /**
     * @covers \Parsers\GoogleHtmlParser::parseFormat
     */
    public function testParseReturnsDomDocument()
    {
        $data = file_get_contents(__DIR__ . "/../fixtures/google_search.html");
        $parser = new \Parsers\GoogleHtmlParser();
        $parsed = $parser->parseFormat($data);
        $this->assertInstanceOf('DOMDocument', $parsed);
    }

    /**
     * @covers \Parsers\GoogleHtmlParser::parseFormat
     * @covers \Parsers\GoogleHtmlParser::filter
     */
    public function testFilter()
    {
        $data = file_get_contents(__DIR__ . "/../fixtures/google_search.html");
        $parser = new \Parsers\GoogleHtmlParser();
        $parsed = $parser->parseFormat($data);
        $filtered = $parser->filter($parsed);

        $this->assertEquals(count($filtered), 14);
        $this->assertContainsOnly('\DOMElement', $filtered);
    }

    /**
     * @covers \Parsers\GoogleHtmlParser::parseData
     */
    public function testParseData()
    {
        $data = file_get_contents(__DIR__ . "/../fixtures/google_search.html");
        $parser = new \Parsers\GoogleHtmlParser();
        $parsed = $parser->parse($data);
        $expected = $this->getExpectedResults();

        foreach ($parsed as $index => $googleResult) {
            $this->assertEquals($googleResult->getTitle(), $expected[$index]['title']);
            $this->assertEquals($googleResult->getLink(), $expected[$index]['link']);
            $this->assertEquals($googleResult->getProvider(), 'Google');
        }
    }
}