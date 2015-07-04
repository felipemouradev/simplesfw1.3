<?php

include 'config.php';
//include 'class/routes.php';
//include 'class/alerts.php';
class DB {
	
	static function conn () {
		global $config;
		try {
			//echo var_dump($config);
			$con = new PDO("mysql:host=$config[host];dbname=$config[db];charset=utf8", $config['user'], $config['password'],
    				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		return $con;
	}
 //FIM acao INSERT

}
