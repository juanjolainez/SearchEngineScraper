<?php
/**
 * Created by PhpStorm.
 * User: jreche
 * Date: 5/4/18
 * Time: 5:19 PM
 */

namespace tests\phpunit\unit;

use PHPUnit\Framework\TestCase;

class PHPUnitUtil
{
    /**
     * @param \stdClass $obj
     * @param string $methodName
     * @param array $args
     * @return mixed
     */
    public static function invoke($obj, $methodName, $args = []) {
        $class = new \ReflectionClass($obj);
        $method = $class->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($obj, $args);
    }
}