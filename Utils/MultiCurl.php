<?php

namespace Utils;
use Cache\KeyValueCache;

/**
 * Util helper
 *
 */
class MultiCurl
{

    /**
     * @return KeyValueCache
     */
    protected function getKeyValueCache()
    {
        return new KeyValueCache();
    }

    /**
     * @param $url
     * @return string
     */
    protected function getCacheKey($url)
    {
        return md5($url);
    }

	/**
	 * Perform a GET request against a given URL if it's not cached
	 *
	 * @author	Juanjo Lainez
	 * @param	string[]	$urls
	 * @return	array
	 */
	public function performMultiGet($urls)
	{
		$curl_arr = [];
		$master = curl_multi_init();

        $raw_results = [];
        $missing_urls = [];

        //Check if we have values already cached
        $cache = $this->getKeyValueCache();
        foreach ($urls as $i => $url) {
            $key = $this->getCacheKey($url);
            if ($cache->exists($key)) {
                $raw_results[] = $cache->get($key);
            } else {
                $missing_urls[] = $url;
            }
        }


        //Curl the remaining ones
		foreach ($missing_urls as $i => $url) {
            $curl_arr[$i] = curl_init($url);

            curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_arr[$i], CURLOPT_FOLLOWLOCATION, true);
            curl_multi_add_handle($master, $curl_arr[$i]);
        }

		do {
			curl_multi_exec($master, $running);
		} while($running > 0);


		for($i = 0; $i < count($missing_urls); $i++) {
            $raw_results[$i] = curl_multi_getcontent  ( $curl_arr[$i]  );
            $cache->put($this->getCacheKey($missing_urls[$i]), $raw_results[$i]);
		}

        return $raw_results;
	}
}
