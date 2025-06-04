<div class="heading hpad">Submitted Data</div>
<table>
	<?php
	$formData = $_SESSION['formData'];
	unset($_SESSION['formData']);
	foreach ($formData as $name => $value) {
		echo "<tr><td>{$name}:</td><td>{$value}</td></tr>";
	}
	?>
</table>
