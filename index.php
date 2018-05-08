<?php

spl_autoload_register();

$method = $_SERVER['REQUEST_METHOD'];
$path = str_replace('/', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$params  = explode("&", $_SERVER['QUERY_STRING']);

//Make a key, value array for params
$keyValueParams = [];
foreach ($params as $raw_param) {
    $components = explode('=', $raw_param);
    $keyValueParams[$components[0]] = isset($components[1]) ? $components[1] : null;
}

$router = new \Router\Router($method, $path, $keyValueParams);
$router->bind('GET', 'search', new \Controllers\SearchController());
$router->bind('GET', 'searchResults', new \Controllers\SearchController());
$router->resolve();