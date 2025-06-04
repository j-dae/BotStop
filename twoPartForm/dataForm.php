<div class="heading hpad">Two-Part Form</div>
<?php
if ($dispatcher->error !== null)
	echo "<div style='color: #a00000;'>{$dispatcher->error}</div>";
?>
<form method="POST" action="">
	<input type="hidden" name="_page" value="dataForm">
	<table>
		<tr>
			<td><label for="Name">Name</label>:</td>
			<td><input type="text" name="Name" id="Name" value="<?= $_POST['Name'] ?? 'John Doe' ?>" autofocus required></td>
		</tr>
		<tr>
			<td><label for="Email">Email</label>:</td>
			<td><input type="text" name="Email" id="Email" value="<?= $_POST['Email'] ?? 'j.doe@example.com' ?>" required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Submit"></td>
		</tr>
	</table>
</form>	
