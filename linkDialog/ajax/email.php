<?php
include '../emails.php';

$error = verify();
if ($error == null) {
	$options = ['expires' => time() + 60 * 60 * 24 * 90, 'path' => '/', 'domain' => $_SERVER['HTTP_HOST'], 'secure' => true, 'httponly' => true, 'samesite' => 'Strict'];
	setcookie('notARobot', 'true', $options);
	echo buildResult();
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

function buildResult() {
	$email = getEmail($_GET['emailId']);
	if ($email == null)
		return '0:Error: Unknown email address.';
	if ($_GET['auto'] == 'true')
		return '2:mailto:' . $email;
	else
		return <<<HTLM
				2:<div id='dMsg'>Email Address:</div>
				<a href='mailto:$email' onclick='vDialog.dialog.close()'>$email</a>
				<input type='reset' value='Close' onclick='vDialog.dClose(event)'>
				HTLM;
}
