<?php

function routeToController($url, $routes)
{
	if (array_key_exists($url, $routes)) {
		$controller = $routes[$url];
		require basepath($controller);
	} else {
		abort();
	}
}

function abort($code = 404)
{
	http_response_code($code);      						// SET the http response code
	require basepath("views/{$code}.php");		// Need a page for each one
	die();
}

//////////

$request = $_SERVER['REQUEST_URI'];
$routes = require basepath('routes.php');

$url = parse_url($request)['path'];

routeToController($url, $routes);
