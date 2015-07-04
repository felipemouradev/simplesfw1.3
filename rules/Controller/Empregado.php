<?php

//include 'rules/Controller/Empregador.php';

class Empregado extends Controller {
	
	protected $parent;
	
	public function index(){
		
		if (isset($this->request->data['login'])!="") :
			if (parent::login()) :
				$this->request->redirect($url = array('controller'=>'empregado','action'=>'inn'));
			endif;
		endif;

		$this->view->render('empregado/index');

	}

	public function singup(){

		$this->acl->centralize();

		$this->model->setModel("empregado");
		parent::cadastrar();
		$this->view->render("empregado/singup");

	}

	public function singin (){

		$this->model->setModel("empregado");
		
		if(parent::login()) {
			$this->request->reditect($url = array('empregado','inn'));
		}

		$this->view->render('empregado/index');
	}

	public function inn() {

		parent::permission();
		//$this->request->redirect($url = array('controller'=>'home','action'=>'index'));
		$this->view->render('empregador/inn');
	}
}