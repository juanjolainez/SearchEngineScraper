<?php

namespace Utils;
use Models\Result;

/**
 * JSONEncoder class
 *
 */
class JSONEncoder
{

	/**
	 * Perform a GET request against a given URL.
	 *
	 * @author	Juanjo Lainez
	 * @param	Result[][] $results
	 * @return	string
	 */
	public function encode($results_by_keyword)
	{
        $serialized = [];
		foreach ($results_by_keyword as $keyword => $result_array)
        {
            $serialized[$keyword] = [];
            foreach ($result_array as $result) {
                $data = [
                    'provider' => $result->getProvider(),
                    'title' => $result->getTitle(),
                    'link' => $result->getLink()
                ];

                $serialized[$keyword][] = $data;
            }
        }

        return json_encode($serialized);
	}
}
