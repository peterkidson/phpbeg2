<?php

use Core\KDatabase;

$config = require basepath('config.php');
$db = new KDatabase($config['database']);

$notes = $db->kquery("select * from notes where userid = 1")->kfetchAll();

view('notes/index.view.php', [
	'heading' 	=> 'My Notes',
	'notes'		=> $notes
]);
