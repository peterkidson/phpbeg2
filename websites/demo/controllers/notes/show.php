<?php

use Core\KDatabase;

$config = require basepath('config.php');
$db = new KDatabase($config['database']);

$userid = 1;

$noteIdInGetRequest = $_GET['id'];
$note = $db->kquery("select * from notes where id = :id", [':id' => $noteIdInGetRequest])->kfindOrFail();

kauthorise($note['userid'] === $userid);		// Can't even view

view('notes/show.view.php', [
	'heading' => 'Note',
	'note' => $note
]);

