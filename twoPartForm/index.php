<?php
require_once 'config.php';

function validate() {
	if (!isset($_POST['Email']) || filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL))
		return null;
	else
		return 'Invalid email address.';
}

include "botstop/Dispatcher.php";
$dispatcher = new Dispatcher();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Two-Part Form</title>
		<meta name="description" content="A PHP example showing the BotStop protection of two-part forms without a popup dialog.">	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles.css">
		<link rel="stylesheet" href="botstop/codeForm.css">
  </head>
  <body>
		<div id="page" class="example">
			<?php include ($dispatcher->page == 'codeForm' ? 'botstop/' : '') . "{$dispatcher->page}.php"; ?>
			<div class="pad">
				<a href="../">&lt;&lt;</a>
			</div>
		</div>
	</body>
</html>
