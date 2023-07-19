<?php

//require basepath('KResponse.php');
$config = require basepath('config.php');
$db = new KDatabase($config['database']);

$noteIdInUrl = $_GET['id'];

$note = $db->kquery("select * from notes where id = :id", [ ':id' => $noteIdInUrl])->kfindOrFail();

$userid = 1;

kauthorise($note['userid'] === $userid);

view('notes/show.view.php', [
	'heading' 	=> 'Note',
	'note'		=> $note
]);
