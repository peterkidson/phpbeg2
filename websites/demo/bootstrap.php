<?php

Use Core\KApp;
Use Core\KContainer;
Use Core\KDatabase;

$container = new KContainer();

$container->bind(KDatabase::class, function () {
	$config = require basepath('config.php');
	$db = new KDatabase($config['database']);
	return $db;
});

KApp::setContainer($container);