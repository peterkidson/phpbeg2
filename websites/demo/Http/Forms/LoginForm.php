<?php

namespace Http\Forms;

use Core\KValidator;
use Core\ValidationException;

class LoginForm
{
	private $errors = [];

	public function __construct($attributes)
	{
		if (! KValidator::email($attributes['email'])) {
			$this->errors['email'] = 'Invalid email';
		}
		if (! KValidator::string($attributes['password'],3) ) {
			$this->errors['password'] = 'Invalid password';
		}

		return empty($this->errors);

	}

	public static function validateFormats($attributes)
	{
		$instance = new static($attributes);
		if ($instance->failed()) {
			throw new ValidationException();
		}
		return $instance;
	}

	public function failed()
	{
		return count($this->errors);
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