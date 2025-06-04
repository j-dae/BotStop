<head>
	<title>Form Dialog</title>
	<meta name="description" content="A PHP example showing the BotStop protection of form submissions.">	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<?php include 'include/formHead.php'; ?>
</head>
<body onload="loaded()">
	<div id="page" class="example">
		<div class="heading hpad">Form Dialog</div>
		<?php
		if ($dispatcher->error !== null)
			echo "<div style='color: #a00000;'>{$dispatcher->error}</div>";
		?>
		<form id="dForm" method="POST" action="" onsubmit="vDialog.form.onSubmit(event)">
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
		<div class="pad">
			<a href="../">&lt;&lt;</a>
		</div>
	</div>
	<?php include 'include/dialog.php'; ?>
</body>
