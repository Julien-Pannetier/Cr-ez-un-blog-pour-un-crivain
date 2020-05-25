<?php
class Functions {

	public static function excerpt($string, $limit) {
	    $lastSpace = strpos($string, ' ', $limit);
	    return substr($string, 0, $lastSpace) . '...';
	}
}