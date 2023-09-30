<?php

namespace Http\Forms;

use Core\KValidator;

class LoginForm
{
	private $errors = [];

	public function validateFormats($email, $password)
	{
		if (! KValidator::email($email)) {
			$this->errors['email'] = 'Invalid email';
		}
		if (! KValidator::string($password,3) ) {
			$this->errors['password'] = 'Invalid password';
		}

		return empty($this->errors);
	}

	public function errors()
	{
		return $this->errors;
	}

	public function error($name,$message)
	{
		$this->errors[$name] = $message;
	}

}