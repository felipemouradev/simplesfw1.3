<div class="col-md-12">
<?php
include 'view/empregador/comp_header.php';
?>
<h1><small> Favor preencha Seu Perfil </small></h1>
	<div class="form-horizontal">
		<?php
		$form = new Form;
		echo $form->FormBegin ($dados = array('name'=>'form','action'=>'/elabor/empregador/editar_perfil','method'=>'post'));
		?>
		
			<div class="form-group">
				<div class="col-md-6">
				<?php
					echo "<label>Nome da empresa </label>".$form->Input($input = array('name'=>'empregador','type'=>'text','class'=>'form-control','placeholder'=>'Digite o Nome de Sua Empresa'));
				?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
				<?php
					echo "<label>CNPJ </label>".$form->Input($input = array('name'=>'cnpj','type'=>'text','class'=>'form-control', 'placeholder'=>'Digite CNPJ da sua Empresa'));
				?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
				<?php
					echo $form->Input($input = array('name'=>'empregador_id','type'=>'hidden','value'=>$_SESSION['login']['login_id']));
				?>
				</div>
			</div>
		
		<?php
			echo $form->FormEnd($submit = array('value'=>'Salvar','class'=>'btn btn-primary'));
		?>	
	</div>		
</div>
