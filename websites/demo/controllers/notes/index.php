<?php

use Core\App;
use Core\KDatabase;

$db = App::container()->resolve(KDatabase::class);

$notes = $db->kquery("select * from notes where userid = 1")->kfetchAll();

view('notes/index.view.php', [
	'heading' 	=> 'My Notes',
	'notes'		=> $notes
]);
