<?php

/*
 * This file is made to test the GoogleHtmlParser model
 */

namespace tests;

require_once __DIR__ . "/../../../../Models/YahooResult.php";

use Models\YahooResult;
use PHPUnit\Framework\TestCase;

class YahooResultUnitTest extends TestCase
{
    /**
     * @covers \Models\YahooResult::getProvider
     */
    public function testGetProvider()
    {
        $result = new YahooResult();
        $this->assertEquals($result->getProvider(), 'Yahoo!');
    }
}