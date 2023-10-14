<?php

use Core\KAuthenticator;
use Http\Forms\LoginForm;

$staticLoginForm = LoginForm::validate($attributes = [
	'email' => $_POST['email'],
	'password' => $_POST['password']
]);

if ((new KAuthenticator())->attempt($attributes['email'],$attributes['password'])) {
	redirect('/');
}

$staticLoginForm->error('email','Bad credentials');

return redirect('/login');




