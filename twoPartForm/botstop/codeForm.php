<?php
if ($dispatcher->error == null)
	echo "<div>I am not a robot:</div>";
else
	echo "<div style='color: #a00000;'>{$dispatcher->error}</div>";
?>
<iframe src="<?= CODE_VIEW_URL ?>&code=<?= $_SESSION['cryptedCode'] ?? '' ?>"></iframe>
<div>
	<label for="code">Code:</label>
	<div class="row" style="padding-top: 2px;">
		<form method="POST" action="">
			<input type="hidden" name="_page" value="codeForm">
			<div class="row">
				<input type="text" name="code" value="" id="code" autocomplete="off" autocapitalize="off" autofocus required>
				<input type="submit" value="Verify">
			</div>
		</form>
		<form method="POST" action="">
			<input type="hidden" name="_page" value="codeForm">
			<input type="image" src="botstop/refresh.png" alt="Refresh" width="16" height="16">	
		</form>
	</div>	
</div>
