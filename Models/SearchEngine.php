<?php

namespace Models;

use Clients\GoogleSearchClient;
use Clients\YahooSearchClient;
use Exceptions\ClientNotFoundException;
use Parsers\GoogleHtmlParser;
use Parsers\YahooHtmlParser;
use Providers\SearchProvider;

/**
 * Search Engine model. It's implemented as a singleton to avoid
 * too many class creations
 *
 */
class SearchEngine
{
	private static $instance;
	private $providers;

    /**
     * SearchEngine constructor.
     */
	protected function initialize()
	{
        //Generic Search provider with IOC
		$this->providers = [
            'google' => new SearchProvider(new GoogleSearchClient(), new GoogleHtmlParser()),
            'yahoo'  => new SearchProvider(new YahooSearchClient(),  new YahooHtmlParser())
		];
	}

    /**
     * @return SearchEngine
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
            self::$instance->initialize();
        }

        return self::$instance;
    }

    /**
     * @param $origin
     * @return SearchProvider
     * @throws ClientNotFoundException
     */
	public function getSearchProvider($origin)
	{
		if (isset($this->providers[$origin])) {
			return $this->providers[$origin];
		}

		throw new ClientNotFoundException($origin);
	}

    /**
     * It will return an array of keyword => Result[]
     * where keywords are the words in $query
     *
     * @param $origin
     * @param $query
     * @return Result[][]
     * @throws ClientNotFoundException
     */
	public function search($origin, $query, $url_to_find, $num_results)
	{
		$client = $this->getSearchProvider($origin);
		return $client->search($query, $url_to_find, $num_results);
	}

}
