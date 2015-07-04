<?php 
session_start();

include 'system/Request.php';
include 'system/Template.php';
include 'system/Form.php';
include 'system/Model.php';
include 'system/Dispatch.php';
include 'system/Acl.php';
include 'system/View.php';
include 'system/Controller.php';

?>

<?php
//aqui é onde a magica acontece
$dispatch = new Dispatch;
$dispatch->Dispatchable();
//onde a view termina





