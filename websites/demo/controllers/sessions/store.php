<?php


use Core\App;
use Core\KDatabase;
use Core\KValidator;

$db = App::container()->resolve(KDatabase::class);

$email		= $_POST['email'];
$password	= $_POST['password'];

$errors = [];
if (! KValidator::email($email)) {
	$errors['email'] = 'Email error';
}
if (! KValidator::string($password)) {
	$errors['password'] = 'Password error 2';
}
if (! empty($errors)) {
	return view('sessions/create.view.php', [
		'errors' => $errors
	]);
}

$user = $db->query('select * from users where email = :xemail', ['xemail' => $email])->find();
if (!)

login(['email' => $email]);