<?php

use Core\KDatabase;

$config = require basepath('config.php');
$db = new KDatabase($config['database']);

$userid = 1;
$noteIdInUrl = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {		// for delete
	$note = $db->kquery("select * from notes where id = :id", [':id' => $noteIdInUrl])->kfindOrFail();
	kauthorise($note['userid'] === $userid);

	$db->kquery('delete from notes where id = :id2del', [
		'id2del' => $noteIdInUrl
	])	;

	header('location: /notes');
	exit();
}
else {
	$note = $db->kquery("select * from notes where id = :id", [':id' => $noteIdInUrl])->kfindOrFail();

	kauthorise($note['userid'] === $userid);		// Can't even view

	view('notes/show.view.php', [
		'heading' => 'Note',
		'note' => $note
	]);
}
