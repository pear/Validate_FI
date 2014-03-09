<?php

function do_not_ignore_any_error($errno, $errstr, $errfile, $errline)  {
	$error_names = array(
		1 => 'E_ERROR',
		2 => 'E_WARNING',
		4 => 'E_PARSE',
		8 => 'E_NOTICE',
		16 => 'E_CORE_ERROR',
		32 => 'E_CORE_WARNING',
		64 => 'E_COMPILE_ERROR',
		128 => 'E_COMPILE_WARNING',
		256 => 'E_USER_ERROR',
		512 => 'E_USER_WARNING',
		1024 => 'E_USER_NOTICE',
		2048 => 'E_STRICT',
		4096 => 'E_RECOVERABLE_ERROR',
		8192 => 'E_DEPRECATED',
		16384 => 'E_USER_DEPRECATED',
	);
	$errorname = $error_names[$errno];

	if ($errno !== E_USER_ERROR) {
		trigger_error("PHP Error $errorname ($errno): $errstr (at $errfile:$errline)", E_USER_ERROR);
	}

	return false;
}

set_error_handler("do_not_ignore_any_error", E_ALL | E_STRICT);

?>
