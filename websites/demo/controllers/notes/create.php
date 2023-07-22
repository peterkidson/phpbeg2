<?php

use Core\Validator;
use Core\KDatabase;

require basepath('Core/Validator.php');

$config = require basepath('config.php');
$db = new KDatabase($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if (! Validator::string($_POST['bodyname'], 1, 100)) {
		$errors['bodyname'] = 'Size must be >= 1 and <= 100';
	}

	if (empty($errors)) {
		$db->kquery("insert into notes(body,userid) values(:body, :userid)", [
			"body" 	=> $_POST["bodyname"],
			"userid"	=> 1
		]);
	}
}

view('notes/create.view.php', [
	'heading' 	=> 'Create Note',
	'errors'		=> $errors
]);

