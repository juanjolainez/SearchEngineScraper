<?php

namespace Clients;

use Models\YahooResult;

/**
 * Class YahooSearchClient
 * @package Clients
 */
class YahooSearchClient extends HTMLSearchClient implements ISearchClient
{
    const YAHOO_URL = 'https://search.yahoo.com/search?p={QUERY}&b={START}';

    /**
     * @param string $word
     * @param int $num_results
     * @return string[]
     */
    public function getUrls(string $word, int $num_results)
    {
        //Make batches of 10
        $num_batches = $num_results/10 + ($num_results % 10 != 0);

        $urls = [];
        for($i = 0; $i < $num_batches; $i++) {
            $url = str_replace('{QUERY}', $word, self::YAHOO_URL);
            $url = str_replace('{START}', $i*10 + 1, $url);
            $urls[] = $url;
        }

        return $urls;
    }
}