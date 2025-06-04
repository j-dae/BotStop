<?php
if (verify()) {
	$options = ['expires' => time() + 60 * 60 * 24 * 90, 'path' => '/', 'domain' => $_SERVER['HTTP_HOST'], 'secure' => true, 'httponly' => true, 'samesite' => 'Strict'];
	setcookie('notARobot', 'true', $options);
	echo '1:ok';
} else
	echo '0:Invalid code.';

function verify() {
	if (isset($_GET['code'])) {
		session_start();
		$matched = $_SESSION['code'] == $_GET['code'];
		if ($matched) {
			unset($_SESSION['code']);
			unset($_SESSION['cryptedCode']);
		}
		return $matched;
	} else
		return isset($_COOKIE['notARobot']);
}
