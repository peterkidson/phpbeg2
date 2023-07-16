<?php

$config = require('config.php');
$db = new KDatabase($config['database']);

$notes = $db->query("select * from notes where userid = 1")->kfetchAll();

view("notes/index.view.php", [
	'heading' 	=> 'My Notes',
	'notes'		=> $notes
]);