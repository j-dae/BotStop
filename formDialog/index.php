<?php

function validate() {
	if (!isset($_POST['Email']) || filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL))
		return null;
	else
		return 'Invalid email address.';
}

include "include/Dispatcher.php";
$dispatcher = new Dispatcher();
?>
<!DOCTYPE html>
<html lang="en">
	<?php include "{$dispatcher->page}.php"; ?>
</html>
