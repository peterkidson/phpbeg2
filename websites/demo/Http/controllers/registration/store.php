<?php

use Core\KApp;
use Core\KDatabase;
use Core\KValidator;
use Http\Forms\LoginForm;

$email		= $_POST['email'];
$password	= $_POST['password'];

$form = new LoginForm();
$form->validate($email,$password);

//$errors = [];
//if (! KValidator::email($email)) {
//	$errors['email'] = 'Email error';
//}
//if (! KValidator::string($password, 3, 10)) {
//	$errors['password'] = 'Password error';
//}
//if (! empty($errors)) {
//	return view('registration/create.view.php', [
//		'errors' => $errors
//	]);
//}

$db = KApp::container()->resolve(KDatabase::class);
$user = $db->query('SELECT * FROM users WHERE email = :emailx', ['emailx' =>$email])->find();

if ($user) {
	redirect('/');
}

$db->query('INSERT INTO users (email,password,name,login) VALUES(:xemail, :xpassword, :xname, :xlogin)', [
	'xemail' 	=> $email,
	'xpassword'	=> password_hash($password,PASSWORD_BCRYPT),
	'xname'		=> $email,
	'xlogin'		=> $email
]);

$user = $db->query('SELECT * FROM users WHERE email = :emailx', ['emailx' =>$email])->find();
if ($user) {
	login($user);
}

redirect('/');

