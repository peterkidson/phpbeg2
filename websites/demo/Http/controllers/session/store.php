<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email		= $_POST['email'];
$password	= $_POST['password'];

$form = new LoginForm();

if ($form->validateFormats($email,$password)) {
	$auth = new Authenticator();

	if ($auth->attempt($email,$password)) {
		redirectAndDie('/');
	}
	$form->error('email','Bad credentials');
}

//$_SESSION['_flash']['errors'] = $form->errors();
Session::flash('errors', $form->errors());

return redirectAndDie('/login');

//return view('session/create.view.php', [
//	'errors' => $form->errors()
//]);



