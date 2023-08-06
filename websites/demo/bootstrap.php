<?php

Use Core\App;
Use Core\Container;
Use Core\KDatabase;

$container = new Container();

$container->bind('Core\Database', function () {
	$config = require basepath('config.php');
	$db = new KDatabase($config['database']);
	return $db;
});

$db = $container->resolve('Core\Database');

App::setContainer($container);