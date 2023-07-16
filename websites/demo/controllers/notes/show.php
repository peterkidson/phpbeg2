<?php

require('KResponse.php');
$config = require('config.php');
$db = new KDatabase($config['database']);

$noteIdInUrl = $_GET['id'];

$note = $db->query("select * from notes where id = :id", [ ':id' => $noteIdInUrl])->kfindOrFail();

$userid = 1;

authorise($note['userid'] === $userid);

view("notes/show.view.php", [
	'heading' 	=> 'Note',
	'note'		=> $note
]);