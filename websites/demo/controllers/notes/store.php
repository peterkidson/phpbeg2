<?php

use Core\Validator;
use Core\KDatabase;

$config = require basepath('config.php');
$db = new KDatabase($config['database']);

$errors =[];

if (! Validator::string($_POST['bodyname'], 1, 100)) {
	$errors['bodyname'] = 'Size must be >= 1 and <= 100';
}
if (! empty($errors)) {
	// validation issue
	return view('notes/create.view.php', [
		'heading' 	=> 'Create Note',
		'errors'		=> $errors
	]);
}

$db->kquery("insert into notes(body,userid) values(:body, :userid)", [
	"body" 	=> $_POST["bodyname"],
	"userid"	=> 1
]);

header('location: /notes');
die();


