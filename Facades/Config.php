<?php

namespace Facades;

/**
 * Configuration class
 *
 */
class Config
{
    /**
     * @var Config
     */
    protected static $instance;

    /**
     * @var array
     */
    protected $content;

    /**
     * @return Config
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
            self::$instance->initializeConfig();
        }

        return self::$instance;
    }

    /**
     * Initialize config
     */
    private function initializeConfig()
    {
        try {
            $file_content = file_get_contents(__DIR__ . '/../config.json');
            $this->content =  json_decode($file_content, true);
        } catch (\Exception $e) {
            $this->content = [];
        }
    }
    
	/**
	 * Returns the value of $searchString in the config file if 
	 * found, null otherwise
	 *
	 * @author	Juanjo Lainez
	 * @param   string  $searchString Key to retrieve from config
     * @param   string  $default      VAlue to return in case of failure
	 * @return	mixed
	 */
	public function get($searchString, $default = null)
	{
        return isset($config[$searchString]) ? $config[$searchString] : $default;
	}

}
