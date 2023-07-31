<?php

use Core\KDatabase;

$config = require basepath('config.php');
$db = new KDatabase($config['database']);

$userid = 1;

if (	$_SERVER['REQUEST_METHOD'] === 'POST'
	&&	$_POST['_pseudoMethod'] === "DELETE") {
	$noteIdInPostRequest = $_POST['idFromTheForm'];  // (=== $_GET['id'] as it happens)
	$note = $db->kquery("select * from notes where id = :id", [':id' => $noteIdInPostRequest])->kfindOrFail();
	kauthorise($note['userid'] === $userid);

	$db->kquery('delete from notes where id = :deleteThisNoteId', [
		'deleteThisNoteId' => $noteIdInPostRequest
	])	;

	header('location: /notes');
	exit();
}
else {
	$noteIdInGetRequest = $_GET['id'];
	$note = $db->kquery("select * from notes where id = :id", [':id' => $noteIdInGetRequest])->kfindOrFail();

	kauthorise($note['userid'] === $userid);		// Can't even view

	view('notes/show.view.php', [
		'heading' => 'Note',
		'note' => $note
	]);
}
