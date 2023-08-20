<?php


$router->addGetRoute		('/', 						'controllers/index.php');
$router->addGetRoute		('/about', 				'controllers/about.php');
$router->addGetRoute		('/contact', 				'controllers/contact.php');

$router->addGetRoute		('/notes', 				'controllers/notes/index.php');
$router->addPostRoute	('/notes',					'controllers/notes/store.php');

$router->addGetRoute		('/note', 					'controllers/notes/show.php');
$router->addPatchRoute	('/note', 					'controllers/notes/update.php');
$router->addGetRoute		('/note/edit', 			'controllers/notes/edit.php');
$router->addDeleteRoute	('/note',					'controllers/notes/destroy.php');
$router->addGetRoute		('/zap',					'controllers/notes/zap.php');

$router->addGetRoute		('/notes/create',		'controllers/notes/create.php');
$router->addPostRoute	('/notes/create',		'controllers/notes/create.php');

$router->addGetRoute		('/register', 			'controllers/registration/create.php');


