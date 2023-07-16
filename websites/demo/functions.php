<?php

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

function authorise($condition, $status = KResponse::FORBIDDEN)
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
	return basepath('views/' . $path);
}
