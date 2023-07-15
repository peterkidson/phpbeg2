<?php

function router($url, $routes)
{
	if (array_key_exists($url, $routes)) {
		$requirePage = $routes[$url];
		require $requirePage;
	} else {
		abort();
	}
}

function abort($code = 404)
{
	http_response_code($code);      	// SET the http response code
	require "views/{$code}.php";		// Need a page for each one
	die();
}

//////////

$request = $_SERVER['REQUEST_URI'];
$url = parse_url($request)['path'];

router($url, require('routes.php'));
