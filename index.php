<?php
if (isset($_GET['resetCookie'])) {
	$options = ['expires' => time() - 3600, 'path' => '/', 'domain' => $_SERVER['HTTP_HOST'], 'secure' => true, 'httponly' => true, 'samesite' => 'Strict'];
	setcookie('notARobot', '', $options);
	header("Location: ./");
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles.css">
		<title>BotStop PHP Examples</title>
		<meta name="description" content="This page lists the BotStop PHP examples and allows to reset the verification.">	
	</head>
	<body>	
		<div id="page">
			<div class="heading">
				BotStop PHP Examples
			</div>
			<div style="line-height: 1.5;">
				Please note: After a successful verification you can <a href="./?resetCookie=yes">click here</a> to reset it,
				otherwise no further verification will be done.
			</div>
			<a href="linkDialog/">Link Dialog</a>
			<a href="twoPartForm/">Two-Part Form</a>
			<a href="formDialog/">Form Dialog</a>
		</div>
	</body>
</html>
