<?php

use Core\KResponse;    /// needed for show()

function d($var)
{
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
}

function dd($var)
{
	d($var);
	die();
}

function requestUri($value)
{
	return $_SERVER['REQUEST_URI'] === $value;
}

function kauthorise($condition, $status = KResponse::FORBIDDEN)
{
	if (! $condition ) {
		abort($status);
	}
}

function abort($code = 404)
{
	http_response_code($code);      						// SET the http response code
	require basepath("views/{$code}.php");		// Need a page for each one
	die();
}

function basepath($path)
{
	return BASE_PATH . $path;
}

function view($path, $urlParams = [])
{
	extract($urlParams);
	require basepath('views/' . $path);
}

