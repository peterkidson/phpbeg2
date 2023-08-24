<?php

namespace Core;

class KValidator
{
	public static function string($value, $min = 1, $max = INF)
	{
		$value = trim($value);
		$return = strlen($value) >= $min  &&  strlen($value) <= $max  &&  $value != "badnote";
		return $return;
	}

	public static function email($value)
	{
		$return = filter_var($value,FILTER_VALIDATE_EMAIL);
		return $return;
	}

}