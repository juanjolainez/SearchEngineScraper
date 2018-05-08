<?php

/*
 * This file is made to test the GoogleHtmlParser model
 */

namespace tests;

require_once __DIR__ . "/../../../../Models/Result.php";

use Models\Result;
use PHPUnit\Framework\TestCase;

class MockResult extends Result
{
    public function getProvider()
    {
        return 'MockTest';
    }
}

class ResultUnitTest extends TestCase
{
    /**
     * @covers \Models\Result::setLink
     * @covers \Models\Result::getLink
     */
    public function testGetSetLink()
    {
        $result = new MockResult();
        $link = 'http//www.test.com';
        $result->setLink($link);
        $this->assertEquals($link, $result->getLink());
    }

    /**
     * @covers \Models\Result::setTitle
     * @covers \Models\Result::getTitle
     */
    public function testGetSetTitle()
    {
        $result = new MockResult();
        $title = 'Title test';
        $result->setTitle($title);
        $this->assertEquals($title, $result->getTitle());
    }
}