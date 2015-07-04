<h2> Para cadastrar vagas você primeiro precisa preencher o formulário abaixo </h2>

<?php
	
	if(isset($result)!=NULL) : echo "<p class='flash bg-primary'>".$result."</p>";
	else : NULL; 
	endif;
?>
<div class="form-horizontal top">
	<?php
	$form = new Form;
	echo $form->FormBegin ($dados = array('name'=>'form','action'=>'/elabor/empregador/singup','method'=>'post'));
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
	<div class="form-group">
		<div class="col-md-4">
		<?php
			echo "<label>Repita a Senha </label>".$form->Input($input = array('name'=>'re_senha','type'=>'password','class'=>'form-control', 'placeholder'=>'Repita a Senha'));
		?>
		</div>
	</div>

	<?php
		echo $form->FormEnd($submit = array('value'=>'Cadastrar','class'=>'btn btn-primary'));
	?>
</div>

