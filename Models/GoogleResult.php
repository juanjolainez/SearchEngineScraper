<?php

namespace Models;

require_once __DIR__ . "/Result.php";


/**
 * GoogleResult model
 *
 * @author	Juanjo Lainez
 */
class GoogleResult extends Result
{

    const PROVIDER_NAME = 'Google';

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
