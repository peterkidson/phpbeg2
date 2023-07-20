<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "core/functions.php";

spl_autoload_register(function ($class) {
	require basepath("core/{$class}.php");
});

require basepath("core/router.php");



