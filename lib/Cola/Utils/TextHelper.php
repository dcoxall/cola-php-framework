<?php
namespace Cola;

class Utils_TextHelper
{
	public static function strToClass($string)
	{
		$string = preg_split('/\s+|_+/', $string);
		$result = '';
		foreach ($string as $word) {
			$result .= ucwords($word);
		}
		return $result;
	}
}
