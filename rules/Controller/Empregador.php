<?php


class Empregador extends Controller {
	
	public function index (){
		
		$this->acl->centralize();

		if (isset($this->request->data['login'])!="") :
			(self::singin());
		endif;

		$this->view->render('empregador/index');
	}

	public function singup(){
		
		$this->acl->centralize();

		$this->model->setModel("empregador");
		parent::cadastrar();
		$this->view->render('empregador/singup');
	}

	public function singin (){
		$this->model->setModel("empregador");

		if(parent::login()) :
			$this->request->redirect($url = array('controller'=>'empregador','action'=>'inn'));
		endif;
	}

	public function inn() {

		parent::permission();
		//$this->request->redirect($url = array('controller'=>'home','action'=>'index'));
		$this->view->render('empregador/inn');

	}
	public function perfil (){

		parent::permission();

		$this->model->setModel("perfil_empregador");
		
		$result = $this->model->find($cond = array('empregador_id'=>$this->acl->login['login_id']));


		if ($result!=NULL) :
			$this->view->set('perfil',$result);
			$this->view->render('empregador/meuperfil');			
		else :
			$this->request->redirect($url = array('controller'=>'empregador','action'=>'editar_perfil'));
		endif;
		
	}
	public function editar_perfil (){
		
		parent::permission();

		$this->model->setModel("perfil_empregador");

		$validate = $this->request->validate($validate = array('empregador','cnpj','empregador_id'));
		
		//echo var_dump($validate);
		
		if ($validate=="true") :
			
			$result = $this->model->find($cond = array('empregador_id'=>$this->acl->login['login_id']));
			//echo var_dump($result);
			if ($result) :
				//echo var_dump($result);
				$update = $this->model->update($this->request->data,$con = array('empregador_id'=>$this->request->data['empregador_id']));
				//echo $update;
				if ($update) :

					$this->view->flash ($msg = "Salvo com sucesso! ");
					$this->request->redirect($url = array('controller'=>'empregador','action'=>'perfil'));

				endif;

			else :

				$salva = $this->model->add($this->request->data);

				if ($salva) :

					$this->view->flash ($msg = "Salvo com sucesso! ");
					$this->request->redirect($url = array('controller'=>'empregador','action'=>'perfil'));

				endif;

			endif;

		elseif (is_array($validate)&&!empty($validate)) :

			$this->view->set('result',$validate);

		endif;

		$this->view->render('empregador/editar_perfil');

	}

	public function loggout (){
		parent::loggout();
		$this->request->redirect($url = array('controller'=>'home','action'=>'index'));
	}

}