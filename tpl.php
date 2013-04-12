<?php
class tpl {
	public $file;
	public $parameters;
	public function __construct($file, $parameters = array()) {
		$this->file = "tpl/" . $file . ".php";
		$this->parameters = normalize_array($parameters);
	}

	public function __toString() {
		extract(normalize_array($this->parameters));
		ob_start();
		include $this->file;
		$return = ob_get_contents();
		ob_end_clean();
		return $return;
	}
}