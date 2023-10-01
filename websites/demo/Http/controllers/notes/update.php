<?php

use Core\KApp;
use Core\KDatabase;
use Core\KValidator;

$db = KApp::container()->resolve(KDatabase::class);

$noteIdInPostRequest = $_POST['id'];
$note = $db->query("select * from notes where id = :id", [':id' => $noteIdInPostRequest])->findOrFail();

kauthorise($note['userid'] === $_SESSION['user']['user']['id']);		// Can't even view

$errors = [];

if (! KValidator::string($_POST['textarea_name'], 1, 100)) {
	$errors['textarea_name'] = 'Size must be >= 1 and <= 100 (and not be badnote)';
}

if (count($errors)) {
	// validation issue
	return view('notes/create.view.php', [
		'heading' 	=> 'Edit Note',
		'errors'		=> $errors,
		'note'		=> $note
	]);
}

$db->query('update notes set body = :body where id = :id', [
	'id'		=> $_POST['id'],
	'body'	=> $_POST['textarea_name'],
]);

redirectAndDie('/notes');
