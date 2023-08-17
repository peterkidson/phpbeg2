<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
	$rclass = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	require basepath("{$rclass}.php");
});

$router = new \Core\Router();
require basepath('routes.php');

require basepath('bootstrap.php');

$prequest = $_SERVER['REQUEST_URI'];
$puri = parse_url($prequest)['path'];

$pmethod = $_POST['_pseudoMethod'] ?? $_SERVER['REQUEST_METHOD'];

$router->routeTheRequest($puri, $pmethod);

