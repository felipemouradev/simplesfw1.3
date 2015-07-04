<?php 

class View {

	public $dados = array();
	public $flash = array();


	public function set ($name,$value){

		$this->dados[$name] = $value;

	}

	public function get ($name=''){

		if ($name=='') :
			return $this->dados;
		else : 
			if (isset($this->dados[$name]) && ($this->dados[$name] != '')) :
				return $this->dados[$name];
			else:
				return '';
			endif;
		endif;

	}

	public function render ($arquivo) {
		
		$data = $this->get();
		//echo var_dump($data);

		foreach ($data as $key => $value) :
			$$key = $value;
		endforeach;

		if (file_exists("view/".$arquivo.".php")) :
			include 'view/'.$arquivo.'.php';
			//echo 'view/'.$arquivo.'.php';
		endif;
	}
	
	public function flash($array) {

		
			$_SESSION['flash']['time_old'] = time()+1;
			$_SESSION['flash']['msg'] = $array;
		
	}

	public function view_flash(){

		$expires = (!empty($_SESSION['flash']['time_old'])) ? $expires = $_SESSION['flash']['time_old'] - time() : $expires = NULL ;
		
		if ($expires != NULL && $expires > 0) :
			return $_SESSION['flash']['msg'];
		else :
		    unset($_SESSION['flash']);
		endif;

	}

}

