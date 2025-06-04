<?php
require_once 'config.php';
require_once 'include/createCode.php';

$cryptedCode = createCode();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Link Dialog</title>
		<meta name="description" content="A PHP example showing the BotStop protection of links and email addresses.">	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles.css">
		<?php include 'include/formHead.php'; ?>
	</head>
	<body onload="loaded()">
		<div id="page">
			<div class="heading">
				Link Dialog
			</div>
			<div class="row">
				<a href="" onclick="vDialog.link.clicked(event, 'email1')">Email Link 1</a>
				<a href="" onclick="vDialog.link.clicked(event, 'email2')">Email Link 2</a>
			</div>				
			<div class="row">
				<a href="" onclick="vDialog.link.clicked(event, 'email1', false)">Email Address 1</a>
				<a href="" onclick="vDialog.link.clicked(event, 'email2', false)">Email Address 2</a>
			</div>
			<a href="../">&lt;&lt;</a>
		</div>
		<?php include 'include/dialog.php'; ?>
	</body>
</html>
