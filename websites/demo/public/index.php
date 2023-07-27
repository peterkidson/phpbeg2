<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
	$rclass = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	require basepath("{$rclass}.php");
});

$router = new \Core\Router();

$request = $_SERVER['REQUEST_URI'];
$routes = require basepath('routes.php');

$uri = parse_url($request)['path'];

$router->route($uri, 'GET');




