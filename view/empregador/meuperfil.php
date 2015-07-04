<div class="col-md-12">
<?php
include 'view/empregador/comp_header.php';
	//echo var_dump($perfil);
	if (isset($perfil)):
?>
		<p> Empresa:  <?=$perfil['empregador'];?></p>
		<p> CNPJ: <?=$perfil['cnpj'];?></p>
<?php
	else :
?>
	<h1>Perfil ainda não criado ! </h1>
<?php
endif;
?>
<p><?=$form->sLink($ar = array('action'=>'/elabor/empregador/editar_perfil','label'=>'Editar Meu Perfil')); ?></p>
</div>