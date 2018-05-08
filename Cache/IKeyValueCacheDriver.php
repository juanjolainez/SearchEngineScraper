<?php
/**
 * Created by PhpStorm.
 * User: jreche
 * Date: 5/2/18
 * Time: 6:44 PM
 */

namespace Cache;

interface IKeyValueCacheDriver
{
    /**
     * @param String $key Key
     * @return \stdClass
     */
    public function get(string $key);

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function put(string $key, $value);

    /**
     * @param String $key Key
     * @return boolean
     */
    public function exists(string $key);
}