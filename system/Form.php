<?php

//include 'class/http.php';

class Form {
	public $value = array();
	function __construct(){

		$this->value = new Request;
	}
	function FormBegin (array $attrib){

		$nome =  (!empty($attrib['name'])) ? $nome = $attrib['name'] : NULL;		
		
		$action = (!empty($attrib['action'])) ? $action = $attrib['action'] : NULL;
			
		$class = (!empty($attrib['class'])) ? $class = $attrib['class'] : NULL ;

		$method = (!empty($attrib['method'])) ? $method = $attrib['method'] : NULL;

		$form = "<form "; 
		$form .= " name = '".$nome."' ";
		$form .= " action = '".$action."' ";
		$form .= " class = '".$class."' ";
		$form .= " method = '".$method."'";	
		$form.=">";
		//echo var_dump($attrib);
		return $form;
	}
	
	function Input(array $input){
		$inpt = "";
		//array de atributos vindos de input
		$name = (!empty($input['name'])) ? $name = $input['name'] : NULL;

		$type = (!empty($input['type'])) ? $type = $input['type'] : NULL;

		$value = (!empty($input['value'])) ? $value = $input['value'] : $value = (!empty($this->value->data[$name])) ? $value = $this->value->data[$name] : NULL;

		$class = (!empty($input['class'])) ? $class = $input['class'] : NULL;

		$placeholder = (!empty($input['placeholder'])) ? $placeholder = $input['placeholder'] : NULL;


		if ($type == "textarea") {
			$inpt = "<".$type." name = '".$name."' class = '".$class."' >".$value."</".$type.">"; 	
		} else {
			
			$inpt .= "<input type = '".$type."' name = '".$name."' class = '".$class."' value = '".$value."' placeholder = '".$placeholder."'>";
		}
		return $inpt;

	}

	function sLink (array $url){

		$action = (!empty($url['action'])) ? $action = $url['action'] : NULL;

		$target = (!empty($url['target'])) ? $target = $url['target'] : NULL;

		$class = (!empty($url['class'])) ? $class = $url['class'] : NULL;

		$label = (!empty($url['label'])) ? $label = $url ['label'] : NULL;

		$url_return = "<a href='".$action."' target = '".$target."' class = '".$class."'>".$label."</a>";
		
		return $url_return;
	}

	function FormEnd(array $submit){

		$class = (!empty($submit['class'])) ? $class = $submit['class'] : NULL;
		$value = (!empty($submit['value'])) ? $value = $submit['value'] : NULL;

		$form = "<input type='submit' value='".$value."' class='".$class."'>";
		$form.= "</form>";
		return $form;
	}

}//fim html

