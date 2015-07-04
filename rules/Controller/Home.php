<?php

class Home extends Controller {
	
	public function index(){
		self::empregado();
		self::ver_vagas();
		//echo Request::getController();

	}

	public function empregado(){

		$msgEmpregado = "Cadastre seu curriculo grátis em nosso banco de dados! Sem toda aquela complicação de estar preenchendo longos formularios ";
		$this->view->set('msgEmpregado',$msgEmpregado);
		//$this->view->render('home/index');
	}
	public function ver_vagas (){
		$lista_vagas = $this->db->conn()->prepare("SELECT v.*,a.*,e.id,pe.empregador FROM (((vagas AS v
										   INNER JOIN area_de_atuacao AS a ON v.area_atuacao_id = a.id)
										   INNER JOIN empregador AS e ON v.empregador_id = e.id)
										   INNER JOIN perfil_empregador AS pe ON e.id = pe.empregador_id)
										   ORDER BY v.id DESC LIMIT 5");
		$lista_vagas->execute();

		$a_r = $lista_vagas->fetchAll();
		
		$this->view->set('vagas',$a_r);
		$this->view->render('home/index');
		//return $a_r;
	}

	public function cadastrar (){
		$this->view->render('home/cadastrar');
	}

	public function add(){

		$this->model->setModel("vagas");
		
		if (!empty($this->request->data)) :
			if($this->model->add($this->request->data)) :
				$this->view->set('msg',"Salvo com sucesso!");
				$this->view->render('home/add');
			else :
				//$this->view->flash($msg = "Deu Erro! ");
				$this->view->set('msg','Deu Erroo!');
				$this->view->render('home/add');
			endif;
		endif;
	}
}