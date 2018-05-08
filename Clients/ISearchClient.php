<?php

namespace Clients;

/**
 * Interface ISearchClient
 * @package Clients
 */
interface ISearchClient
{
    /**
     * @param String $word Word to search
     * @return string[]
     */
    public function search(string $word, int $num_results);
}