<?php

use Core\KApp;
use Core\KValidator;
use Core\KDatabase;

$db = KApp::container()->resolve(KDatabase::class);

$errors =[];

if (! KValidator::string($_POST['textarea_name'], 1, 100)) {
	$errors['textarea_name'] = "Size must be > 1 and <= 100 (and not be 'badnote')";
}

if (! empty($errors)) {
	// validation issue
	return view('notes/create.view.php', [
		'heading' 	=> 'Create Note',
		'errors'		=> $errors
	]);
}

$db->query("insert into notes(body,userid) values(:newbody, :userid)", [
	"newbody" 	=> $_POST["textarea_name"],
	"userid"		=> $_SESSION['user']['user']['id']
]);

redirect('/notes');


