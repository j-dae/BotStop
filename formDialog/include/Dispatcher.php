<?php

class Dispatcher {

	public $page = null;
	public $error = null;
	public $cryptedCode = null;

	function __construct() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->error = validate();
			if ($this->error == null) {
				$this->page = 'dataHandler';
				return;
			}
		}
		require_once 'config.php';
		require_once 'include/createCode.php';
		$this->cryptedCode = createCode();
		$this->page = 'dataForm';
	}
}
