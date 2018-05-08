<?php

/*
 * This file is made to test the GoogleHtmlParser model
 */

namespace tests;

require_once __DIR__ . "/../../../../Models/GoogleResult.php";

use Models\GoogleResult;
use PHPUnit\Framework\TestCase;

class GoogleResultUnitTest extends TestCase
{
    /**
     * @covers \Models\GoogleResult::getProvider
     */
    public function testGetProvider()
    {
        $result = new GoogleResult();
        $this->assertEquals($result->getProvider(), 'Google');
    }
}