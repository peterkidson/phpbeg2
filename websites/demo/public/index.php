<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
	$rclass = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	require basepath("{$rclass}.php");
});

require basepath("Core/router.php");



