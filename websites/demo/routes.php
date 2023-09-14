<?php


$router->addGetRoute		('/', 						'index.php');
$router->addGetRoute		('/about', 				'about.php');
$router->addGetRoute		('/contact', 				'contact.php');

$router->addGetRoute		('/notes', 				'notes/index.php')->only('auth');
$router->addPostRoute	('/notes',					'notes/store.php');

$router->addGetRoute		('/note', 					'notes/show.php');
$router->addPatchRoute	('/note', 					'notes/update.php');
$router->addGetRoute		('/note/edit', 			'notes/edit.php');
$router->addDeleteRoute	('/note',					'notes/destroy.php');
$router->addGetRoute		('/zap',					'notes/zap.php');

$router->addGetRoute		('/notes/create',		'notes/create.php');
$router->addPostRoute	('/notes/create',		'notes/create.php');

$router->addGetRoute		('/register', 			'registration/create.php')->only('guest');
$router->addPostRoute	('/register', 			'registration/store.php')->only('guest');

$router->addGetRoute		('/login', 				'session/create.php')->only('guest');
$router->addPostRoute	('/session',	 			'session/store.php')->only('guest');
$router->addDeleteRoute	('/session',	 			'session/destroy.php')->only('auth');



