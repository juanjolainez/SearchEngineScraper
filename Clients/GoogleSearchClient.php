<?php

namespace Clients;

use Models\GoogleResult;
use Utils\MultiCurl;

/**
 * Class GoogleSearchClient
 * @package Clients
 */
class GoogleSearchClient extends HTMLSearchClient implements ISearchClient
{
    const GOOGLE_URL = 'https://www.google.com/search?q={QUERY}&start={START}';

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
            $url = str_replace('{QUERY}', $word, self::GOOGLE_URL);
            $url = str_replace('{START}', $i*10, $url);
            $urls[] = $url;
        }
        
        return $urls;
    }
}