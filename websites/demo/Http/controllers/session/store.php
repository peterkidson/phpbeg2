<?php

use Core\AuthenticateUser;
use Http\Forms\LoginForm;

$email		= $_POST['email'];
$password	= $_POST['password'];

$form = new LoginForm();

if ($form->validateFormats($email,$password)) {
	$auth = new AuthenticateUser();

	if ($auth->attempt($email,$password)) {
		redirectAndDie('/');
	}
	$form->error('email','Bad credentials');
}

Session::flash('errors', $form->errors());

return redirect('/login');




