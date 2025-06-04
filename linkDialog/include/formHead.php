<link rel="stylesheet" href="css/dialog.css">
<script>
	function loaded() {
		vDialog = new Dialog('<?= $cryptedCode ?>', '<?= CODE_VIEW_URL ?>', 'ajax/newCode.php');
		vDialog.createLinkHandler('ajax/email.php', <?= isset($_COOKIE['notARobot']) ? 'true' : 'false' ?>);
	}
</script>
<script src="js/util.js"></script>
<script src="js/dialog.js"></script>
<script src="js/linkHandler.js"></script>