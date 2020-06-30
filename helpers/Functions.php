<?php
class Functions {

	// Chapter excerpt
	public static function excerpt($string, $limit) {
		if (mb_strlen($string) <= $limit) {
			return $string;
		}
	    $lastSpace = mb_strpos($string, ' ', $limit);
	    return mb_substr($string, 0, $lastSpace) . '...';
	}

	// Flash message
	public static function flash($msg, $type) {
		$_SESSION['flash'] = array(
			'msg'  => $msg,
			'type' => $type
		);
	}
}