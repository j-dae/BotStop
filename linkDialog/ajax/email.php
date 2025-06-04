<?php
include '../emails.php';

if (verify()) {
	$options = ['expires' => time() + 60 * 60 * 24 * 90, 'path' => '/', 'domain' => $_SERVER['HTTP_HOST'], 'secure' => true, 'httponly' => true, 'samesite' => 'Strict'];
	setcookie('notARobot', 'true', $options);
	echo buildResult();
} else
	echo '0:Invalid code.';

function verify() {
	if (isset($_GET['code'])) {
		session_start();
		return $_SESSION['code'] == $_GET['code'];
	} else
		return isset($_COOKIE['notARobot']);
}

function buildResult() {
	$email = getEmail($_GET['emailId']);
	if ($email == null)
		return '0:Error: Unknown email address.';
	if ($_GET['auto'] == 'true')
		return '1:mailto:' . $email;
	else
		return <<<HTLM
				1:<div id='dMsg'>Email Address:</div>
				<a href='mailto:$email' onclick='vDialog.dialog.close()'>$email</a>
				<input type='reset' value='Close' onclick='vDialog.dClose(event)'>
				HTLM;
}
