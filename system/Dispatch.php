<?php

class Dispatch {

	protected $request = NULL;
	protected $template = NULL;
	
	public function __construct(){

		$this->request = new Request;
		$this->template = new Template;

	}

	public function DispatchController() {
		
		$controller = $this->request->setController();
		//echo $controller;
		if (file_exists("rules/Controller/".$controller.".php")) :
			
			include "rules/Controller/".$controller.".php";
			
			$instance = new $controller;

		elseif ($controller=="home"||$controller == "") :
			$controller = "home";
			include 'rules/Controller/'.$controller.'.php';
			$instance = new $controller;

		else :

			die ("Não foi possivel encontrar esta Página! ");

		endif;

		return $instance;
	}

	public function DispatchAction() {

		$instance = self::DispatchController();

		$action = $this->request->setAction();
		//echo $action;
		$controller = $this->request->setController();
		

		if (method_exists($controller, $action)) :

			if ($action=="index") :
				
				return $instance->$action();

			else :

				return $instance->$action();

			endif;

		else :
			die ("Não foi possivel encontrar esta ação ! ");
		endif;

	}

	public function Dispatchable ($template = "default"){
		//echo $template;
		$this->template->setTemplate($template);
		//$this->template->header();
		$this->template->topo(); //
		$this->template->op_conteudo(); // 

		//self::DispatchController();
		self::DispatchAction();
		$this->template->off_conteudo(); //
		$this->template->footer(); 
	}
}