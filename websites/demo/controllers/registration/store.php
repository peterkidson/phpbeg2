<?php

$email		= $_POST['email'];
$password	= $_POST['password'];

view('registration/create.view.php', [
	'heading' 	=> 'Create User',
	'errors'		=> []
]);

