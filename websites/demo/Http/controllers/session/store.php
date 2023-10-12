<?php

use Core\KAuthenticator;
use Core\Session;
use Http\Forms\LoginForm;


$form = LoginForm::validate($attributes = [
	'email'		=> $_POST['email'],
	'password'	=> $_POST['password']
	]);

if ((new KAuthenticator())->attempt($attributes['email'],$attributes['password'])) {
	redirect('/');
}

$form->error('email','Bad credentials');

Session::flash('errors', $form->errors());

Session::flash('old', ['email' => $_POST['email']]);

return redirect('/login');


