<?php
class Dispatcher {

	public $page = null;
	public $error = null;

	function __construct() {
		if (isset($_POST['_page'])) {
			$page = $_POST['_page'];
			if ($page == 'dataForm')
				$this->setDataResponse();
			else if ($page == 'codeForm')
				$this->setCodeResponse();
		}
		if ($this->page == null)
			$this->page = 'dataForm';
	}

	function setDataResponse() {
		$this->error = validate();
		if ($this->error == null) {
			unset($_POST['_page']);
			session_start();
			$_SESSION['formData'] = $_POST;
			if (isset($_COOKIE['notARobot']))
				$this->page = 'dataHandler';
			else
				$this->setCodePage();
		} else
			$this->page = 'dataForm';
	}

	function setCodeResponse() {
		if (isset($_POST['code'])) {
			session_start();
			if ($_POST['code'] == $_SESSION['code']) {
				$options = ['expires' => time() + 60 * 60 * 24 * 90, 'path' => '/', 'domain' => $_SERVER['HTTP_HOST'], 'secure' => true, 'httponly' => true, 'samesite' => 'Strict'];
				setcookie('notARobot', 'true', $options);
				$this->page = 'dataHandler';
			} else {
				$this->error = 'Invalid code.';
				$this->page = 'codeForm';
			}
		} else
			$this->setCodePage();
	}

	function setCodePage() {
		$code = substr((new \Random\Randomizer())->shuffleBytes('abcdefghijklmnopqrtuvwxy'), 0, 5);
		$cryptedCode = urlencode(openssl_encrypt($code, 'aes-128-ecb', SECRET_KEY, 0));
		if (session_status() == PHP_SESSION_NONE)
			session_start();
		$_SESSION['code'] = $code;
		$_SESSION['cryptedCode'] = $cryptedCode;
		$this->page = 'codeForm';
	}
}
