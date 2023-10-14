<?php

namespace Core;

class ValidationException extends \Exception
{
	public readonly array $errors;
	public readonly array $old;

	public static function throw($errors,$old)
	{
		$newStaticInstance = new static;
		$newStaticInstance->errors	= $errors;
		$newStaticInstance->old		= $old;
		throw $newStaticInstance;
	}
}