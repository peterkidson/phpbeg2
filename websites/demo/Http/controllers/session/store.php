<?php


use Core\KApp;
use Core\KDatabase;
use Http\Forms\LoginForm;

$db = KApp::container()->resolve(KDatabase::class);

$email		= $_POST['email'];
$password	= $_POST['password'];

$form = new LoginForm();

if (! $form->validate($email,$password)) {
	return view('session/create.view.php', [
		'errors' => $form->errors()
	]);
}

$user = $db->query('select * from users where email = :xemail', ['xemail' => $email])->find();
if ($user) {
	if (password_verify($password,$user['password'])) {
		login($user);
		header('location: /');
		exit();
	}
}

return view('session/create.view.php', [
	'errors'	=> [ 'password' => 'Bad credentials']
]);


