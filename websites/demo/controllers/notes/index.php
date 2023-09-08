<?php

use Core\KApp;
use Core\KDatabase;

$db = KApp::container()->resolve(KDatabase::class);

$notes = $db->query("select * from notes where userid = 1")->fetchAll();

view('notes/index.view.php', [
	'heading' 	=> 'Notes',
	'notes'		=> $notes
]);
