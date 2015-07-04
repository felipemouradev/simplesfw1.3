<div class="row top">
	<div class="col-lg-12">
<?php
$form = new Form;

$link = $form->sLink($array = array('action'=>'/elabor/empregador/loggout','label'=>'Sair'));
?>
<h1>Bem vindo(a) <?=$_SESSION['login']['login'] ." <small>".$link."</small>";?></h1>
<?php 
	  if(isset($result)!=NULL&&!is_array($result)) :
	  		echo "<p class='flash bg-primary'>".$result."</p>";
	  else :
	  	if ((isset($result)&&is_array($result))) :
	  		echo "<div class='flash bg-primary'>";
	  		
	  		foreach ($result as $key => $value) :
	  			echo "<p>".$value."</p>";
	  		endforeach; 

	  		echo "</div>";
		elseif (!empty(view::view_flash())) :
		  	echo "<p class='flash bg-primary'>".view::view_flash()."</p>";
		endif;
	  endif;
?>
	</div>
</div>

<div class="row top">
	<div class="col-md-4">
	    <div class="list-group">
	    	<a href='/elabor/empregador/inn' class="list-group-item <?=Template::currentAction($url = '/empregador/inn' );?>">Inicio</a>
	    	<a href='/elabor/empregador/perfil' class="list-group-item <?=Template::currentAction($url = '/empregador/perfil');?>">Perfil</a>
	    	<a href='/elabor/empregador/cadastrarvaga' class="list-group-item <?=Template::currentAction($url = '/empregador/cadastrarvaga');?>">Cadastrar Vaga</a>
	    	<a href='/elabor/empregador/minhasvagas' class="list-group-item <?=Template::currentAction($url = '/empregador/minhasvagas');?>">Minhas Vagas</a>            
	    </div>
	</div>
</div>

