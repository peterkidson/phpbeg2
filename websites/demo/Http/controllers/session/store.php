<?php

use Core\KAuthenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email		= $_POST['email'];
$password	= $_POST['password'];

$form = new LoginForm();

if ($form->validateFormats($email,$password)) {
	$auth = new KAuthenticator();

	if ($auth->attempt($email,$password)) {
		redirectAndDie('/');
	}
	$form->error('email','Bad credentials');
}

Session::setFlash('errors', $form->errors());
Session::setFlash('old', ['email' => $email]);

return redirectAndDie('/login');


