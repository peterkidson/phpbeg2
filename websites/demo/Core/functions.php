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

function urlIs($url)
{
	return $_SERVER['REQUEST_URI'] === $url;
}

function kauthorise($condition, $status = KResponse::FORBIDDEN)
{
	if (! $condition) {
		abort($status);
	}
}

function basepath($path)
{
	return BASE_PATH . $path;
}

function view($path, $vars = [])
{
	extract($vars);
	require basepath('views/' . $path);
}

