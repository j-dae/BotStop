<head>
	<title>Submitted Data</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div id="page" class="example">
		<div class="heading hpad">Submitted Data</div>
		<table>
			<?php
			foreach ($_POST as $name => $value) {
				echo "<tr><td>{$name}:</td><td>{$value}</td></tr>";
			}
			?>
		</table>
		<div class="pad">
			<a href="../">&lt;&lt;</a>
		</div>
	</div>
</body>
