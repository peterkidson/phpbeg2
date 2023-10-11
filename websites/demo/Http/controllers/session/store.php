<?php

use Core\KAuthenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email		= $_POST['email'];
$password	= $_POST['password'];

LoginForm::validateFormats($email,$password)

if ((new KAuthenticator())->attempt($email,$password)) {
	redirectAndDie('/');
}
$form->error('email','Bad credentials');

Session::setFlash('errors', $form->errors());
Session::setFlash('old', ['email' => $email]);

return redirectAndDie('/login');


