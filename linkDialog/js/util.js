function httpGet(url, resultHandler) {
	fetch(url)
		.then((response) => {
			if (!response.ok) {
				throw new Error(`HTTP error: ${response.status}`);
			}
			return response.text();
		})
		.then((text) => {
			resultHandler(text.trim());
		})
		.catch((error) => {
			console.log(error);
		});
}
