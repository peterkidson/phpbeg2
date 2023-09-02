<?php

namespace Core\Middleware;

class Middleware
{
	public const MAP = [
		'guest'	=> Guest::class,
		'auth'	=> Auth::class,
	];

	public static function resolve($key)
	{
		if (!$key) {
			return;
		}

		$middlewareClass = static::MAP[$key] ?? false;

		if (!$middlewareClass) {
			throw new \Exception("No middleware for key '{$key}'");
		}

		(new $middlewareClass)->handle();
	}

}