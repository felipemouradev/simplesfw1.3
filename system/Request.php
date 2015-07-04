<?php

include 'config.php';

class request {

	protected $controller;
	protected $action;
	protected $url;

	public $data = array();

	public function __construct(){

		$this->url = $_SERVER['REQUEST_URI'];

		self::setController();
		self::setAction();


		$i = 0;
		
		$this->data = (isset($_POST)) ? $this->data = $_POST : $this->data = NULL;

		foreach ($this->data as $key => $value) :
			if ($i==0&&$value==NULL) :
				return $this->data[null] = NULL;
			else :
				return $this->data[$key] = $value;	
			endif;
		$i++;
		endforeach;
	}

	public function setController(){
		//echo var_dump($this->url);
		$exp = explode ("/",$this->url);

		$controller = (isset($exp[2])) ? $controller = $exp[2] : $controller = "home";
		if ($controller=="") :
			$controller = "home";
		endif;
		return $this->controller = $controller;

	}

	public function setAction (){

		$exp = explode ("/",$this->url);

		$action = (isset($exp[3])) ? $action = $exp[3] : $action = "index";
		
		if ($action == "") {
			$action = "index";
		}

		return $this->action = $action;

	}

	public function getController() {
		//echo $this->controller;
		return $this->controller;
	}

	public function getAction() {
		return $this->action;
	}

	public function redirect ($url) {
		
		global $config;

		$base = $config['name_aplication'];
		$controller = (!empty($url['controller']) && $url['controller'] != "") ? $controller = $url['controller'] : $controller = "home";
		$action = (!empty($url['action']) && $url['action'] != "") ? $action = $url['action'] : $action = "index";
		
		header ("Location: /{$base}/{$controller}/{$action}");
	}

	public function validate(array $campos) {
		
		$msg = array(); 

		//echo var_dump($this->data);

		if (!empty($this->data)&&isset($this->data)) :
			foreach ($campos as $chave) :

					if (!isset($this->data[$chave]) || $this->data[$chave] == "" || empty($this->data[$chave]) || $this->data[$chave] == NULL ) :
						$msg[] = "Falta preencher o campo ".$chave;
					//echo $chave;
					//echo " - ";
					endif;

			endforeach;
		
		endif;

		$return = array();
		

		if (isset($this->data)&&count($msg)>0) :

			$return = $msg;

		elseif(isset($this->data) && (count($msg)) == 0 && !empty($this->data) ) :

			$return = "true";

		endif;

		if (!isset($this->data)) :
			$return = false;
		endif;

		//echo var_dump ($return);

		return $return;
	}
	
}

//echo Request::getController();