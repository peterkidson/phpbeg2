<?php

namespace Core;

class Container
{
	protected $m_bindings = [];

	public function bind( $key, $resolver )
	{
		$this->m_bindings[$key] = $resolver;
	}

	public function resolve($key)
	{
		if (! array_key_exists($key,$this->m_bindings)) {
			throw new \Exception("No binding '{$key}' found");
		}
		else {
			$resolver = $this->m_bindings[$key];

			$cuf = call_user_func($resolver);
			return $cuf;
		}
	}
}