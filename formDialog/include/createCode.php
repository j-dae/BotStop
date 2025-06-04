<?php

function createCode() {
	$code = substr((new \Random\Randomizer())->shuffleBytes('abcdefghijklmnopqrtuvwxy'), 0, 5);
	$cryptedCode = urlencode(openssl_encrypt($code, 'aes-128-ecb', SECRET_KEY, 0));
	session_start();
	$_SESSION['code'] = $code;
	$_SESSION['cryptedCode'] = $cryptedCode;
	return $cryptedCode;
}
