<?php

use Core\KAuthenticator;
use Http\Forms\LoginForm;

$staticLoginForm = LoginForm::validate($attributes = [
	'email' => $_POST['email'],
	'password' => $_POST['password']
]);

$signedIn = (new KAuthenticator())->attempt($attributes['email'],$attributes['password']);

if (!$signedIn) {
	$staticLoginForm->error('email', 'Bad credentials')
		->throw();
}

redirect('/');






