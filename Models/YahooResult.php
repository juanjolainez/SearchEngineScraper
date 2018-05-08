<?php

namespace Models;

require_once __DIR__ . "/Result.php";


/**
 * YahooResult model
 *
 * @author	Juanjo Lainez
 */
class YahooResult extends Result
{
    const PROVIDER_NAME = 'Yahoo!';

    /*
     * Get the provider of the result
     *
     * @author	Juanjo Lainez
     * @return	string
     */
    public function getProvider() {
        return self::PROVIDER_NAME;
    }
}
