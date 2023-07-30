<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
	$rclass = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	require basepath("{$rclass}.php");
});

$router = new \Core\Router();
require basepath('routes.php');

$request = $_SERVER['REQUEST_URI'];
$uri = parse_url($request)['path'];

$method = $_POST['_pseudoMethod'] ?? $_SERVER['REQUEST_METHOD'];
$router->routeTheRequest($uri, $method);

