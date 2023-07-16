<?php

require 'Validator.php';

$config = require('config.php');
$db = new KDatabase($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errors = [];

	if (! Validator::string($_POST['bodyname'], 1, 100)) {
		$errors['bodyname'] = 'Size must be >= 1 and <= 100';
	}

	if (empty($errors)) {
		$db->query("insert into notes(body,userid) values(:body, :userid)", [
			"body" 	=> $_POST["bodyname"],
			"userid"	=> 1
		]);
	}
}

view("notes/create.view.php", [
	'heading' 	=> 'Create Note',
	'errors'		=> $errors
]);
