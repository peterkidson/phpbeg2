<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "functions.php";

//require basepath("KDatabase.php");
//require basepath("KResponse.php");
spl_autoload_register(function ($class) {
	require basepath("core/{$class}.php");
});
require basepath("router.php");



