<?php

namespace Core;

class Session
{
	CONST FLASH_KEY = '_flash';

	public static function put($key,$value)
	{
		$_SESSION[$key] = $value;
	}
	public static function get($key,$default = null)
	{
		if (isset($_SESSION['_flash'][$key])) {
			return $_SESSION['_flash'][$key];
		}
		return $_SESSION[$key] ?? $default;
	}
	public static function has($key)
	{
		return (bool) static::get($key);
	}
	public static function flash($key,$value)
	{
		$session['_flash'][$key] = $value;
	}
	public static function unflash()
	{
		unset($_SESSION['_flash']);
	}
}