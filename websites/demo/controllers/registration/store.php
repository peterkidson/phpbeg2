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
$user = $db->query('SELECT * FROM users WHERE email = :emailx', [
	'emailx' =>$email
])->find();

if ($user) {
	header('location: /');
	exit();
} else {
	$db->query('INSERT INTO users (email,password) VALUES(:xemail, :xpassword)', [
		'xemail' 	=> $email,
		'xpassword'	=> $password
	]);
}

$_SESSION['logged_in']	= true;
$_SESSION['user']			= ['email' => $email ];

header('location: /');
exit();

//
//view('registration/create.view.php', [
//	'heading' 	=> 'Create User',
//	'errors'		=> []
//]);

