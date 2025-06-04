var vDialog;

class Dialog {
	constructor(cryptedCode, codeViewUrl, newCodePath) {
		this.cryptedCode = cryptedCode;
		this.codeViewUrl = codeViewUrl;
		this.newCodePath = newCodePath;
		this.origHtml = null;
		this.dialog = document.getElementById("dialogId");
	}

	createLinkHandler(linkPath, notARobot = false) {
		this.link = new LinkHandler(linkPath);
		this.notARobot = notARobot;
	}

	createFormHandler(verifyPath, formId, notARobot = false) {
		this.form = new FormHandler(verifyPath, formId);
		this.notARobot = notARobot;
	}

	dOpen(event, targetHandler) {
		event.preventDefault();
		this.dialog.showModal();
		if (this.origHtml === null)
			this.origHtml = this.dialog.innerHTML;
		else
			this.dialog.innerHTML = this.origHtml;
		this.setVerifyHandler(targetHandler);
		this.displayCode();
	}

	displayCode() {
		var element = document.getElementById('codeFrame');
		element.src = this.codeViewUrl + `&code=${this.cryptedCode}`;
		element = document.getElementById('dCode');
		element.focus();
	}

	dClose(event) {
		if (event !== null)
			event.preventDefault();
		this.dialog.close();
	}

	setVerifyHandler(targetHandler) {
		var input = document.getElementById("dCode");
		input.onkeydown = function(event) {
			if (event.key === "Enter")
				vDialog.dVerify(event, targetHandler);
		};
		var button = document.getElementById("verifyButton");
		button.onclick = function(event) {
			vDialog.dVerify(event, targetHandler);
		};
	}

	dVerify(event, targetHandler) {
		event.preventDefault();
		var codeInput = document.getElementById('dCode');
		if (codeInput.value === '') {
			codeInput.focus();
			return;
		}
		httpGet(targetHandler.buildPath(codeInput.value), function(result) {
			if (result.startsWith('0:')) {
				vDialog.displayError(result.substring(2));
				codeInput.value = '';
				codeInput.focus();
			} else if (result.startsWith('1:'))
				targetHandler.success(result.substring(2));
		});
	}

	refreshCode() {
		var element = document.getElementById('dMsg');
		element.innerHTML = 'I am not a robot:';
		httpGet(this.newCodePath, function(cryptedCode) {
			if (cryptedCode !== '') {
				vDialog.cryptedCode = cryptedCode;
				vDialog.displayCode();
			}
		});
	}

	displayError(error) {
		var element = document.getElementById('dMsg');
		element.innerHTML = "<span style='color: #a00000;'>" + error + "</span>";
	}
}
