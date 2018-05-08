<?php

namespace Providers;

use Clients\ISearchClient;
use Models\Result;
use Parsers\Parser;

class SearchProvider
{

    /**
     * @var Parser
     */
    private $parser;

    /**
     * @var ISearchClient
     */
    private $client;

    /**
     * GoogleSearchProvider constructor. IOC pattern is implemented here to be able to
     * use any client and any parser.
     * @param ISearchClient $client
     * @param Parser $parser
     */
    public function __construct(ISearchClient $client, Parser $parser)
    {
        $this->client = $client;
        $this->parser = $parser;
    }

    /**
     * Wrapper for testing
     * @return ISearchClient
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * @param String $word Word to search
     * @return Result[][]
     */
    public function search(string $search_keywords, string $url_to_find, $num_results)
    {
        $splitted = explode(',', $search_keywords);

        $results_by_keyword = [];

        //We are performing the search in a parallel way.
        //If we do this in parallel as well we risk ourselves
        //to have memory issues (too many requests at the same time)
        //that can cause the server to go down. Instead we know that
        //for each request we have 10 curls at the same time only.
        foreach ($splitted as $key => $keyword) {
            $keyword = trim($keyword);
            $raw_responses = $this->getClient()->search($keyword, $num_results);
            $results_by_keyword[$keyword] = [];

            foreach ($raw_responses as $raw_response) {
                $parsed_results = $this->parser->parse($raw_response);
                $results_by_keyword[$keyword] = array_merge($results_by_keyword[$keyword], $this->filter($parsed_results, $url_to_find));
            }
        }

        return $results_by_keyword;
    }

    /**
     * @param Result[] $parsed_results
     * @param string $word
     * @return Result[]
     */
    protected function filter($parsed_results, string $word)
    {
        $filtered = [];
        foreach ($parsed_results as $result) {
            if ($this->validate($result, $word)) {
                $filtered[] = $result;
            }
        }

        return $filtered;
    }

    /**
     * Check if the link matches the word we are searching for
     * @param Result $result
     * @param string $word
     * @return boolean
     */
    protected function validate(Result $result, string $word)
    {
        return !empty(preg_match("/$word/", $result->getLink())) ? true : false;
    }

}