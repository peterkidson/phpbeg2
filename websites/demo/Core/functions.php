<?php

use Core\KResponse;    /// needed for show()

const LOG = BASE_PATH . '/logs/klog.log';

function klog($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);

	error_log(date(DATE_RFC822) . " : " . $output."\n", 3, LOG);
}
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
function uriIs($value)
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
function redirectAndDie($path)
{
	header("location: {$path}");
	exit();
}
function old($key,$default = '')
{
	return Core\Session::get('old')[$key] ?? $default;
}
