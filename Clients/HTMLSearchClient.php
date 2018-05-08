<?php
/**
 * Created by PhpStorm.
 * User: jreche
 * Date: 5/2/18
 * Time: 6:41 PM
 */

namespace Clients;

use Models\GoogleResult;
use Utils\MultiCurl;

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

    public abstract function getUrls(string $word, int $num_results);
}