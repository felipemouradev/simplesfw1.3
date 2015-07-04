<div class="row top">
	<div class="col-lg-12">
<?php
$form = new Form;

$link = $form->sLink($array = array('action'=>'/elabor/empregado/loggout','label'=>'Sair'));
?>
<h1>Bem vindo(a) <?=$_SESSION['login']['login'] ." <small>".$link."</small>";?></h1>
<?=include 'view/empregado/alerts.php';?>
	</div>
</div>

<div class="row top">
	<div class="col-md-4">
	    <div class="list-group">
	    	<a href='/elabor/empregado/inn' class="list-group-item <?=Template::currentAction($url = '/empregado/inn' );?>">Inicio</a>
	    	<a href='/elabor/empregado/perfil' class="list-group-item <?=Template::currentAction($url = '/empregado/perfil');?>">Perfil</a>
	    	<a href='/elabor/empregado/cadastrarvaga' class="list-group-item <?=Template::currentAction($url = '/empregado/cadastrarvaga');?>">Cadastrar Vaga</a>
	    	<a href='/elabor/empregado/minhasvagas' class="list-group-item <?=Template::currentAction($url = '/empregado/minhasvagas');?>">Minhas Vagas</a>            
	    </div>
	</div>
</div>

