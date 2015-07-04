<div class="impacto">
	<h1><small><?=$msgEmpregado;?></small></h1>
</div>
<?php
echo "<h1>Ultimas Vagas adcionadas </h1>";
?>

<?php
//echo var_dump($vagas);
foreach ($vagas as $k => $v) :
?>
<div class="vagas">
	<p>Vaga : <?=$v['vaga'];?></p>
	<p>Empresa : <?=$v['empregador'];?></p>
	<p>Aréa de Atuação :<?=$v['area'];?></p>
</div>
<?php
endforeach;



?>

