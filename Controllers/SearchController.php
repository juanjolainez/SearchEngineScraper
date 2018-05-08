<?php

namespace Controllers;

use Exceptions\ClientNotFoundException;
use Factories\View;
use Facades\Config as Config;
use Models\SearchEngine;
use Utils\JSONEncoder;

/**
 * Search application controller. Following MVC with SearchController as Controller,
 * Views in the folder Views as Views and Models (objects) to support the search
 *
 * @author	Juanjo Lainez
 */
class SearchController
{
	/**
	 * Display the search form with the results.
	 *
	 * @author	Juanjo Lainez
	 * @return	View
	 */
	public function getSearch()
    {
		return View::make('search');
	}

    /**
     * Wrapper for testing
     * @return Config
     */
    protected function getConfig()
    {
        return Config::getInstance();
    }

    /**
     * Wrapper for testing
     * @return SearchEngine
     */
    protected function getSearchEngine()
    {
        return SearchEngine::getInstance();
    }

    /**
     * Wrapper for testing
     * @return JSONEncoder
     */
    protected function getJsonEncoder()
    {
        return new JSONEncoder();
    }
    
    
    /**
     * Render the result page with the results of the search
     * @throws \Exception
     */
    public function getSearchResults()
    {
        $query = filter_input(INPUT_GET, 'query', FILTER_SANITIZE_STRING);
        $origin = filter_input(INPUT_GET, 'origin', FILTER_SANITIZE_STRING);
        $url_to_find = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);

        header('Content-Type: application/json');

        if (!isset($query) || !isset($origin) || !isset($url_to_find)) {
            echo json_encode(['error' => "Missing parameters"]);
            return;
        }

        try {
            $num_results = $this->getConfig()->get('search.limit', 100);
            $results = $this->getSearchEngine()->search($origin, $query, $url_to_find, $num_results);
            echo $this->getJsonEncoder()->encode($results);
        } catch (ClientNotFoundException $e) {
            http_response_code(400);
            echo json_encode(['error' => "Client not found " . $e->getMessage()]);
        } catch (\Exception $e) {
            http_response_code(500);
            $error = "Oops! I wasn't planning this. Can I still get the job if I tell you what happened?\n" . $e->getMessage();
            echo json_encode(['error' => $error]);
        }
    }

}
