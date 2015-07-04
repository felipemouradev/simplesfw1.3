
<?php
//include 'system/request.php';

class template {

	protected $template;

	public function setTemplate ($template){
		$this->template = $template;
	}

	public function css($array){
		//echo var_dump($array);
		foreach ($array as $key => $value) :
			echo "<link rel='stylesheet' type='text/css' href='/elabor/".$value['path']."/".$value['name']."'>";
		endforeach;
	}

	public function js($array) {
		//echo var_dump($array);
		foreach ($array as $key => $value) :
			echo "<script type='text/javascript' src='/elabor/".$value['path']."/".$value['name']."'></script>";
		endforeach;
	}

	public function currentPage($page){
		
		$uri = $_SERVER['REQUEST_URI'];
		$exp = explode("/",$uri);

		$pagina = $exp[2];
		
		if ($pagina==$page) :
			$class = "class = 'active'";
		else :
			$class = '';
		endif;

		return $class;
	}

	public function currentAction($url){
		//echo Request::getController();
		$uri = $_SERVER['REQUEST_URI'];
		$exp = explode("/",$uri);
		$url = explode ("/",$url);
		
		if ($exp[2]==$url[1]&&$exp[3]==$url[2]) :
			$class = "active";
		else :
			$class = '';
		endif;

		return $class;

	}
	public function header (){
		include 'view/template/'.$this->template."/header.php";
	}
	public function topo (){
		include 'view/template/'.$this->template."/topo.php";
	}
	public function op_conteudo (){
		include 'view/template/'.$this->template."/op_conteudo.php";
	}
	public function off_conteudo () {
		include 'view/template/'.$this->template."/off_conteudo.php";
	}
	public function footer(){
		include 'view/template/'.$this->template."/footer.php";	
	}
	

}