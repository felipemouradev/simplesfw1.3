<h1>Bem vinda Empresa </h1>
<?php 
	  if(isset($result)!=NULL) : echo "<p class='flash bg-primary'>".$result."</p>";
	  else : 
		  if (!empty(view::view_flash())) :
		  	echo "<p class='flash bg-primary'>".view::view_flash()."</p>";
		  endif;
	  endif;
?>
<div class="form-horizontal top">
<?php
$form = new Form;
echo $form->FormBegin ($dados = array('name'=>'form','action'=>'/elabor/empregador/index','method'=>'post'));
	?>
	<div class="form-group">
		<div class="col-md-4">
		<?php
			echo "<label>Login </label>".$form->Input($input = array('name'=>'login','type'=>'text','class'=>'form-control','placeholder'=>'Digite um login'));
		?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4">
		<?php
			echo "<label>Senha </label>".$form->Input($input = array('name'=>'senha','type'=>'password','class'=>'form-control', 'placeholder'=>'Digite uma Senha'));
		?>
		</div>
	</div>
	<?php
		echo $form->FormEnd($submit = array('value'=>'Cadastrar','class'=>'btn btn-primary'));
	?>
</div>
<p> Para se cadastrar e usar nossos serviços gratuitamente clique <?=$form->sLink($array = array('action'=>'/elabor/empregador/singup','label'=>'aqui'));?> </p>