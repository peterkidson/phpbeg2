<?php

Use Core\App;
Use Core\Container;
Use Core\KDatabase;

$container = new Container();

$container->bind(KDatabase::class, function () {
	$config = require basepath('config.php');
	$db = new KDatabase($config['database']);
	return $db;
});

App::setContainer($container);