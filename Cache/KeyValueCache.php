<?php

namespace Cache;
use Cache\IKeyValueCacheDriver;
use Cache\MemcacheDriver;

/**
 * KeyValueCache. It uses memcache 
 *
 * @author	Juanjo Lainez
 */
class KeyValueCache
{

    /**
     * @var IKeyValueCacheDriver
     */
    protected $driver;

	public function __construct(IKeyValueCacheDriver $driver = null)
	{
        if ($driver) {
            $this->driver = $driver;
        } else {
            $this->driver = $this->getDefaultDriver();
        }
	}

    protected function getDefaultDriver()
    {
        return new MemcacheDriver();
    }

    /**
     * @param String $key Key
     * @return \stdClass
     */
    public function get(string $key)
    {
        return $this->driver->get($key);
    }

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function put(string $key, $value)
    {
        return $this->driver->put($key, $value);
    }

    /**
     * @param String $key Key
     * @return boolean
     */
    public function exists(string $key)
    {
        return $this->driver->exists($key);
    }

}

