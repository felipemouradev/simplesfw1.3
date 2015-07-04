<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro&subset=latin,latin-ext' rel='stylesheet' type='text/css'>-->
<?php
//include 'system/template.php';

//header 
$template = new Template;

$estilo = array('bootstrap'=>array('path'=>'bootstrap/css','name'=>'bootstrap.min.css'),'default'=>array('path'=>'bootstrap/css','name'=>'default.css'));
$template->css($estilo);
$js = array('jquery'=>array('path'=>'bootstrap/js','name'=>'jquery.min.js'),'bootstrap'=>array('path'=>'bootstrap/js','name'=>'bootstrap.js'),'npm'=>array('path'=>'bootstrap/js','name'=>'npm.js'));
$template->js($js);

