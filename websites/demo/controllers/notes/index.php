<?php

use Core\App;
use Core\KDatabase;

$db = App::container()->resolve(KDatabase::class);

$notes = $db->query("select * from notes where userid = 1")->fetchAll();

view('notes/index.view.php', [
	'heading' 	=> 'Notes',
	'notes'		=> $notes
]);
