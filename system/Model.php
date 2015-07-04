<?php

class Model {
	protected $db;
	protected $model;
	protected $pdo;
	
	public function __construct(){
		$this->db = new DB;
	}
	public function setModel($model){
		$this->model = $model;
	}

	public function add ($dados){
		$i=0;
		$chaves = "";
		$valores = "";

		foreach ($dados as $key => $value) :
			if ($i==0) :
				$chaves = $key;
				$valores = "'".$value."'";
			else:
				$chaves .= ",".$key;
				$valores .= ",'".$value."'";
			endif;
		$i++;
		endforeach;

		//echo $chaves ." - ".$valores;

		$query = "INSERT INTO ".$this->model." (".$chaves.") VALUES (".$valores.")";
		//echo $query;
		
		$exec = $this->db->conn()->prepare($query);
		if ($exec->execute()) :
			return true;
		else :
			return false;
		endif;
		
	}

	public function find($condiction = array()){

		$cond = "";
		$query = "SELECT * FROM ".$this->model." WHERE ";
		$num_condic = 0;

		foreach ($condiction as $key => $value) :
			if ($num_condic==0) :
				$query.= $key. " = '{$value}' ";
			else :
				$query.= " AND ".$key. " = '{$value}' ";
			endif;
		$num_condic++;
		endforeach;

		//echo $query;
		//echo "<br>";
		$conn = $this->db->conn()->prepare("{$query}");

		if ($conn->execute()) :
			if ($conn->rowCount()>0) :
				$pdo = $conn->fetchAll();
				return $pdo[0];
			else :
				$pdo = NULL;
				return $pdo;
			endif;
		endif;

	}

	public function update($fields,$condiction = array()) {
		$cond = "";
		$query = "UPDATE ".$this->model." SET ";
		$num_condic = 0;
		$num_fields = 0;

		foreach ($fields as $key=> $value) :
			if ($num_fields==0) :

				$query.= $key. " = '{$value}' ";

			else :

				$query.= ", ".$key. " = '{$value}' ";

			endif;
			$num_fields++;
		endforeach;
		$query .= " WHERE ";
		foreach ($condiction as $key => $value) :
			if ($num_condic==0) :
				$query.= $key. " = '{$value}' ";
			else :
				$query.= ", ".$key. " = '{$value}' ";
			endif;
		$num_condic++;
		endforeach;
		$pdo = "";

		$conn = $this->db->conn()->prepare("{$query}");	

		if ($conn->execute()) :
			
			return true;
		else :
			
			return false;

		endif;
	}

	public function delete($id){
		$query  = "DELETE FROM ".$this->model." WHERE id = ".$id;
		$conn = $this->db->conn()->prepare($query);
		if ($conn->execute()) :
			return true;
		else :
			return false;
		endif;

	}

}