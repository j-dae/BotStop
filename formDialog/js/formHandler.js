class FormHandler {
	constructor(verifyPath, formId) {
		this.verifyPath = verifyPath;
		this.formId = formId;
	}

	buildPath(code) {
		return this.verifyPath + '?code=' + code;
	}

	success(result) {
		vDialog.notARobot = true;
		var form = document.getElementById(this.formId);
		form.submit();
	}

	onSubmit(event) {
		event.preventDefault();
		if (vDialog.notARobot)
			this.success(null);
		else
			vDialog.dOpen(event, this);
	}
}

