<?php

use Core\KAuthenticator;
use Core\Session;
use Http\Forms\LoginForm;

try {
	$staticLoginForm = LoginForm::validate($attributes = [
		'email' => $_POST['email'],
		'password' => $_POST['password']
	]);
}
catch (\Core\ValidationException $ve) {
	Session::flash('errors', $ve->errors);
	Session::flash('old',    $ve->old);

	return redirect('/login');
}

if ((new KAuthenticator())->attempt($attributes['email'],$attributes['password'])) {
	redirect('/');
}

$staticLoginForm->error('email','Bad credentials');




