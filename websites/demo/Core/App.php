<?php

namespace Core;

class App
{
	protected static $m_container;

	public static function setContainer($container)
	{
		static::$m_container = $container;
//		self::$m_container = $container;
	}
	public static function container()
	{
//		return static::$m_container;
		return self::$m_container;
	}
}