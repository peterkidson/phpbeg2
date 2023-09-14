<?php

namespace Http\Forms;

use Core\KValidator;

class LoginForm
{
	public function validate($email,$password)
	{
		$errors = [];
		if (! KValidator::email($email)) {
			$errors['email'] = 'Invalid email';
		}
		if (! KValidator::string($password)) {
			$errors['password'] = 'Invalid password';
		}

		return empty($errors);
	}
}