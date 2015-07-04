<?php

include 'rules/db/DB.php';

class Controller {

	protected $view = NULL;
	protected $db = NULL;
	protected $model = NULL;
	protected $request = array();
	protected $form = NULL;
	protected $acl = NULL;

	public function __construct(){
		$this->view = new View;
		$this->db = new DB;
		$this->model = new Model;
		$this->request = new Request;
		$this->form = new Form;
		$this->acl = new Acl;
	}

	public function index (){

	}

	public function cadastrar (){
		//$this->model->setModel(NULL);
		
		//echo var_dump($this->request->data);

		if (isset($this->request->data['login'])&&$this->request->data['login']!="") :
			
			$result = $this->model->find($con = array('login'=>$this->request->data['login']));
			

			if ($result==NULL) :

				if (($this->request->data['login']!="")&&
					($this->request->data['senha']!="")&&
					($this->request->data['re_senha']!="")) :
					if ($this->request->data['senha']==$this->request->data['re_senha']) :

						unset($this->request->data['re_senha']);

						$this->request->data['senha'] = md5($this->request->data['senha']);

						if ($this->model->add($this->request->data)) :

							$this->view->set('result','Salvo Com Sucesso');
							unset($this->request->data);

						else :

							$this->view->set('result','Houve um erro');

						endif;
					else:

						$this->view->set('result','Senhas Diferentes! ');

					endif;
				else:

					$this->view->set('result','Favor preencher todos os campos');

				endif;

			else:

				$this->view->set('result','Esse Login já está sendo ultilizado, favor tente com outro! ');

			endif;

		endif;
		//$this->view->render('empregador/cadastrar');
	}

	public function login (){
		//this->model->setModel();

		if (isset($this->request->data['login'])&&$this->request->data['login']=="") :
			$this->view->set('result','Favor digitar o Login');
		
		elseif(isset($this->request->data['senha'])&&$this->request->data['senha']=="") :
			$this->view->set('result','Favor digitar a Senha');
		
		elseif(isset($this->request->data['senha']) && ($this->request->data['senha']!="") && (isset($this->request->data['login'])) && ($this->request->data['login']!="")) :

			$result = $this->model->find($cond = array('login'=>$this->request->data['login'],'senha'=>md5($this->request->data['senha']) ));
			//echo var_dump($result);
			if ($result!=NULL) :
			
				$_SESSION['login']['session_id'] = md5(time());
				$_SESSION['login']['login_type'] = "empregador";
				$_SESSION['login']['login_id'] = $result['id'];
				$_SESSION['login']['login'] = $result['login'];

				$this->view->set('result','Login efetuado com sucesso!');
				return true;
			else :

				$this->view->set('result','Erro de autenticação ! ');

			endif;

		else :
			$this->view->set('result','Houve um erro');
		endif;
	}

	public function permission() {
		$this->acl->permission();
	}

	public function loggout(){
		unset($_SESSION['login']);
	}
}