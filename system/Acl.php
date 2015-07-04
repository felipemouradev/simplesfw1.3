<?php
//include 'system/request.php';
//acess list control

class Acl {

	public $login;
	protected $request;
	protected $view;

	public function __construct(){
		$this->request = new Request;
		$this->view = new View;

		if (!empty($_SESSION['login'])) :
			$this->login = $_SESSION['login'];
		else :
			$this->login = NULL;
		endif;
	}

	public function permission() {

		$uri = $_SERVER['REQUEST_URI'];

		$controller = $this->request->setController($uri);

		$action = $this->request->setAction($uri);
		
		//echo var_dump($this->login['login']['login']);

		if ($this->login['login']==NULL) :

			if ($this->login['login_type'] != $controller) :
				 $this->request->redirect($url = array('controller'=>$controller,'action'=>'index'));
				 $this->view->flash($result = 'Favor faça login! ');
			endif;

		endif;
	}

	public function check (){
		
		$uri = $_SERVER['REQUEST_URI'];

		$controller = $this->request->setController($uri);

		$action = $this->request->setAction($uri);
		
		//echo var_dump($this->login['login']['login']);

		if ($this->login['login']==NULL) :

			if ($this->login['login_type'] != $controller) :
				return false;
			else :
				return true;
			endif;

		else :
			return true;
		endif;
	}

	public function centralize (){
		
		if(self::check()) :
			$this->request->redirect($url = array('controller'=>$this->login['login_type'],'action'=>'inn'));	
		endif;
		//echo $this->login['login_type'];
		//$this->redirect($url = array('controller'=>$this->login['login']['login_type'],'action'=>'inn'));
	}
}

