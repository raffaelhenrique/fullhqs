<style>
@media print{
	
	.no-print{
		
		display:none;
		
	}
	
}

</style>

<h1>Relatório de HQS</h1>
<div class="clearfix"></div>

<input class="btn no-print" style="float:right;" type="button" value="Imprimir" onclick="window.print();" /><br /><br />
<table class="table table-striped 
table-hover table-bordered">

<?php
$sql = "select 
	pm.idhq as \"Código Personagem\",
	px.nome as Nome,
	'' as Titulo,
	count(1) as Acessos
	
from paginasmovimento pm
left join personagens px on px.id = pm.idhq 

where pm.idhq <> 0

group by 1
 
order by 4 desc";


		$consulta = $con->prepare($sql);
		//executo o sql
		$consulta->execute();
		//gerar os dados na tela
	
		$linhaAtual = 0;
		while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			echo '<pre>';
			print_r($dados);
			$linhaAtual++;
		}
	?>
</table>