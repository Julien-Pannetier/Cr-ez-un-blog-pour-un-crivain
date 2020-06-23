<?php
class Functions {

	public static function excerpt($string, $limit) {
		if (mb_strlen($string) <= $limit) {
			return $string;
		}
	    $lastSpace = mb_strpos($string, ' ', $limit);
	    return mb_substr($string, 0, $lastSpace) . '...';
	}
}