<?php

use Core\App;
use Core\KValidator;

$email		= $_POST['email'];
$password	= $_POST['password'];

$errors = [];

if (! KValidator::email($email)) {
	$errors['email'] = 'Email error';
}
if (! KValidator::string($password, 3, 10)) {
	$errors['password'] = 'Password error';
}
if (! empty($errors)) {
	return view('registration/create.view.php', [
		'errors' => $errors
	]);
}

$db = App::container()->resolve(\Core\KDatabase::class);
$user = $db->query('select * from users where email = :emailx', [
	'emailx' =>$email
])->find();


dd($user);

view('registration/create.view.php', [
	'heading' 	=> 'Create User',
	'errors'		=> []
]);

