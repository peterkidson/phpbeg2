<?php


use Core\KApp;
use Core\KDatabase;
use Core\KValidator;

$db = KApp::container()->resolve(KDatabase::class);

$email		= $_POST['email'];
$password	= $_POST['password'];

$errors = [];
if (! KValidator::email($email)) {
	$errors['email'] = 'Email error';
}
if (! KValidator::string($password)) {
	$errors['password'] = 'Invalid password';
}
if (! empty($errors)) {
	return view('sessions/create.view.php', [
		'errors' => $errors
	]);
}

$user = $db->query('select * from users where email = :xemail', ['xemail' => $email])->find();
if (!$user) {
	return view('sessions/create.view.php', [
		'errors'	=> [ 'email' => 'No such user found']
	]);
}

$enteredPassword = password_hash($password,PASSWORD_BCRYPT);
if ($enteredPassword === $user['password']) {
//if (password_verify($password,$user['password'])) {
	login(['email' => $email]);
	header('location: /');
	exit();
}

return view('sessions/create.view.php', [
	'errors'	=> [ 'password' => 'Invalid password']
]);


