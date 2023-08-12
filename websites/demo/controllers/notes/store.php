<?php

use Core\App;
use Core\Validator;
use Core\KDatabase;

$db = App::container()->resolve(KDatabase::class);

$errors =[];

if (! Validator::string($_POST['textarea_name'], 1, 100)) {
	$errors['textarea_name'] = 'Size must be >= 1 and <= 100 (and not be badnote)';
}

if (! empty($errors)) {
	// validation issue
	return view('notes/create.view.php', [
		'heading' 	=> 'Create Note',
		'errors'		=> $errors
	]);
}

$db->kquery("insert into notes(body,userid) values(:newbody, :userid)", [
	"newbody" 	=> $_POST["textarea_name"],
	"userid"		=> 1
]);

header('location: /notes');
die();


