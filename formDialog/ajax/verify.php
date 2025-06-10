<?php
$error = verify();
if ($error == null) {
	$options = ['expires' => time() + 60 * 60 * 24 * 90, 'path' => '/', 'domain' => $_SERVER['HTTP_HOST'], 'secure' => true, 'httponly' => true, 'samesite' => 'Strict'];
	setcookie('notARobot', 'true', $options);
	echo '2:ok';
} else
	echo $error;

function verify() {
	if (isset($_GET['code'])) {
		session_start();
		if (isset($_SESSION['code']) && $_SESSION['code'] == $_GET['code'])
			return null;
		else
			return '1:Invalid code.';
	} else {
		if (isset($_COOKIE['notARobot']))
			return null;
		else
			return '0:Unknown error.';
	}
}
