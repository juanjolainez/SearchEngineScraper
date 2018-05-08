<?php

namespace Cache;

/**
 * Memcache cache driver
 *
 * @author	Juanjo Lainez
 */
class MemcacheDriver
{
    /**
     * @var \Memcached
     */
    protected $connection;

    public function __construct()
    {
        $this->connection = new \Memcached();
        $this->connection->addServer("127.0.0.1", 11211);
    }

    /**
     * @return int
     */
    protected function getTTL()
    {
        return 60;
    }

    /**
	 * @param String $key Key
	 * @return \stdClass
	 */
	public function get(string $key)
	{
        return $this->connection->get($key);
	}

	/**
	 * @param string $key
	 * @param $value
	 * @return mixed
	 */
	public function put(string $key, $value)
    {
        return $this->connection->add($key, $value, $this->getTTL());
    }

	/**
	 * @param String $key Key
	 * @return boolean
	 */
	public function exists(string $key)
    {
        return ($this->connection->get($key) != null);
    }
}
