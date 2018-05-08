<?php
/**
 * Created by PhpStorm.
 * User: jreche
 * Date: 5/2/18
 * Time: 6:44 PM
 */

namespace Clients;

interface ISearchClient
{
    /**
     * @param String $word Word to search
     * @return string[]
     */
    public function search(string $word, int $num_results);
}