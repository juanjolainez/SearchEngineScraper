<?php

/*
 * This file is made to test the GoogleHtmlParser model
 */

namespace tests;

require_once __DIR__ . "/../../../Parsers/YahooHtmlParser.php";

use PHPUnit\Framework\TestCase;

/**
 * IMPORTANT
 *
 * Before running this test, the system has to be running on localhost.
 * To do that, run php -S localhost:8000 on the root folder of the project
 *
 * Class SearchControllerSystemTest
 * @package tests
 */
class SearchControllerSystemTest extends TestCase
{
    /**
     * @covers \Parsers\YahooHtmlParser::parseFormat
     */
    public function testSearchEndpoint()
    {
        $ch = curl_init('http://localhost:8000/searchResults?query=creditorwatch,something&origin=yahoo&url=creditorwatch.com.au');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $decoded = json_decode($output, true);
        $this->assertTrue(isset($decoded['creditorwatch']));
        $this->assertTrue(count($decoded['creditorwatch']) >= 1);
        $this->assertTrue(isset($decoded['something']));
    }
}