<h1>Bem vindo Trabalhador </h1>
<?php include 'view/empregado/alerts.php'; ?>
<div class="form-horizontal top">
<?php
$form = new Form;
echo $form->FormBegin ($dados = array('name'=>'form','action'=>'/elabor/empregado/index','method'=>'post'));
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
<p> Para cadastrar seu curriculo e concorrer em nossas vagas clique <?=$form->sLink($array = array('action'=>'/elabor/empregado/singup','label'=>'aqui'));?> </p>