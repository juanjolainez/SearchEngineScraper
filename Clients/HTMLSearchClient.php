<?php

namespace Clients;

use Models\GoogleResult;
use Utils\MultiCurl;

/**
 * Class HTMLSearchClient
 * @package Clients
 */
abstract class HTMLSearchClient implements ISearchClient
{
    /**
     * @param String $word Word to search
     * @return GoogleResult[]
     */
    public function search(string $word, int $num_results)
    {
        if ($num_results < 1) {
            return [];
        }

        $urls = $this->getUrls($word, $num_results);

        //Call in paralel using multi CURL helper
        $multicurl = new MultiCurl();
        return $multicurl->performMultiGet($urls);
    }

    /**
     * @param string $word
     * @param int $num_results
     * @return string[]
     */
    public abstract function getUrls(string $word, int $num_results);
}