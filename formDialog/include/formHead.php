<link rel="stylesheet" href="css/dialog.css">
<script>
	function loaded() {
		vDialog = new Dialog('<?= $dispatcher->cryptedCode ?>', '<?= CODE_VIEW_URL ?>', 'ajax/newCode.php');
		vDialog.createFormHandler('ajax/verify.php', 'dForm', <?= isset($_COOKIE['notARobot']) ? 'true' : 'false' ?>);
	}
</script>
<script src="js/util.js"></script>
<script src="js/dialog.js"></script>
<script src="js/formHandler.js"></script>