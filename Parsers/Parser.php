<?php

namespace Parsers;
use Models\Result;


/**
 * Class HtmlParser. It follows the template pattern.
 * It means that it will declare the algorithm but leave the
 * small pieces of code to its subclasses
 * @package Parsers
 */
abstract class Parser
{
    /**
     * @param string $raw_data
     * @return Result[]
     */
    public function parse(string $raw_data)
    {
        try {
            $raw_objects = $this->parseFormat($raw_data);
            $filtered = $this->filter($raw_objects);
        } catch (\Exception $e) {
            //fail gracefully if something happens
            $filtered = [];
        }


        $search_results = [];

        foreach ($filtered as $key => $raw_object) {
            try {
                if ($this->validate($raw_object)) {
                    $search_results []= $this->parseElement($raw_object);
                }
            } catch (\Exception $e) {
                //Write something in the logs
            }
        }
        
        return $search_results;
    }

    /**
     * @param mixed $raw_data
     * @return mixed
     */
    protected abstract function parseFormat(string $raw_data);

    /**
     * @param mixed $raw_objects
     * @return mixed
     */
    protected abstract function filter($raw_objects);

    /**
     * @param mixed $element
     * @return boolean
     */
    protected abstract function validate($element);

    /**
     * @param mixed $element
     * @return Result
     */
    protected abstract function parseElement($element);
}
