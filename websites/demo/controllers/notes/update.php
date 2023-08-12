<?php

use Core\App;
use Core\KDatabase;
use Core\Validator;

$db = App::container()->resolve(KDatabase::class);

$userid = 1;

$noteIdInPostRequest = $_POST['id'];
$note = $db->kquery("select * from notes where id = :id", [':id' => $noteIdInPostRequest])->kfindOrFail();

kauthorise($note['userid'] === $userid);		// Can't even view

$errors = [];

if (! Validator::string($_POST['textarea_name'], 1, 100)) {
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

$db->kquery('update notes set body = :body where id = :id', [
	'id'		=> $_POST['id'],
	'body'	=> $_POST['textarea_name'],
]);

header('location: /notes');
die();
