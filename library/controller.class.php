<?php
class Controller {

	function __construct() {

	}

	public function load_view($file, $data=[]){
		$folder = get_class($this);
		$view = new Template($folder, $file);
		$view->variables = $data;
		$view->render();
	}

	public function load_model($model){
		$this->$model = new $model;
	}
	
}
