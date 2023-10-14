<?php

use Core\Session;
use Core\ValidationException;

session_start();

$plain = "hello";
$hash = password_hash($plain,PASSWORD_BCRYPT);
if (!password_verify($plain,$hash)) {
	throw Exception("bad hash");
	exit;
}

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

try {
	$router->route($puri, $pmethod);
}
catch (ValidationException $ve) {
	Session::flash('errors', $ve->errors);
	Session::flash('old',    $ve->old);

	return redirect($router->previousUrl());
}

Session::unflash();



