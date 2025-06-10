class LinkHandler {
	constructor(linkPath, auto = true) {
		this.linkPath = linkPath;
		this.auto = auto;
		this.emailId = null;
	}

	buildPath(code) {
		return this.linkPath + '?emailId=' + this.emailId + '&code=' + code + '&auto=' + (this.auto ? 'true' : 'false');
	}

	success(result) {
		vDialog.notARobot = true;
		if (this.auto) {
			vDialog.dClose(null);
			if (result.startsWith('mailto:'))
				location.href = result;
		} else {
			if (!vDialog.dialog.open)
				vDialog.dialog.showModal();
			var element = document.getElementById('dContent');
			element.innerHTML = result;
		}
	}

	clicked(event, emailId, auto = true) {
		this.emailId = emailId;
		this.auto = auto;
		if (vDialog.notARobot) {
			event.preventDefault();
			var path = this.linkPath + '?emailId=' + this.emailId + '&auto=' + (this.auto ? 'true' : 'false');
			httpGet(path, function(result) {
				if (result.startsWith('2:'))
					vDialog.link.success(result.substring(2));
				else {
					document.getElementById('eDialog').showModal();
					document.getElementById('errorMsg').innerHTML = result.substring(2);
				}
			});
		} else
			vDialog.dOpen(event, this);
	}
}
