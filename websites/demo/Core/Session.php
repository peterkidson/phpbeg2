<?php

namespace Core;

const FLASH = "_flash";


class Session
{
	public static function put($key,$value)
	{
		$_SESSION[$key] = $value;
	}
	public static function get($key,$default = null)
	{
		if (isset($_SESSION[FLASH][$key])) {
			return $_SESSION[FLASH][$key];
		}
		return $_SESSION[$key] ?? $default;
	}
	public static function has($key)
	{
		return (bool) self::get($key);
	}
	public static function flash($key, $value)
	{
		$_SESSION[FLASH][$key] = $value;
	}
	public static function unflash()
	{
		unset($_SESSION[FLASH]);
	}
	public static function flush()
	{
		$_SESSION = [];
	}
	public static function destroy()
	{
		self::flush();

		session_destroy();

		$params = session_get_cookie_params();

		setcookie('PHPSESSID', '', time()-60, $params['path'], $params['domain']);
	}
}