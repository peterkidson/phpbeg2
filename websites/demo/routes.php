<?php



$router->addGetRoute('/', 				'controllers/index.php');
$router->addGetRoute('/about', 			'controllers/about.php');
$router->addGetRoute('/contact', 		'controllers/contact.php');

$router->addGetRoute('/notes', 			'controllers/notes/index.php');
$router->addGetRoute('/note', 			'controllers/notes/show.php');
$router->addGetRoute('/notes/create',	'controllers/notes/create.php');