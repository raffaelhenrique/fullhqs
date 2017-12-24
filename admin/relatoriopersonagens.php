<style>
@media print{
	
	.no-print{
		
		display:none;
		
	}
	
}

</style>

<h1>Relatório de Personagens</h1>
<div class="clearfix"></div>

<input class="btn no-print" style="float:right;" type="button" value="Imprimir" onclick="window.print();" /><br /><br />
<table class="table table-striped 
table-hover table-bordered">

<?php
$sql = "select 
	idpersonagem as \"Código Personagem\",
    p.nome as Nome,
	count(1) as Acessos 
from paginasmovimento pm
	left join personagens p on p.id = pm.idpersonagem
	
where 
pm.idpersonagem <> 0 

group by pm.idpersonagem 

order by 3 desc";

		$consulta = $con->prepare($sql);
		//executo o sql
		$consulta->execute();
		//gerar os dados na tela
		$linhaAtual = 0;
		while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			if ($linhaAtual == 0){
				echo '<thead>';
				foreach($dados as $coluna => $valor){
					if ($linhaAtual == 0){
							echo '<th>'.$coluna.'</th>';
					}
				}
				//gera o cabecalho
				echo '<th class="no-print">Link</th>';
			echo '</thead>';
			}
				echo '<tr>';
				$idpersonagematual = 0;
				foreach($dados as $coluna => $valor){
						if ($coluna == "Código Personagem"){
							$idpersonagematual = $valor;
						}
						//insere os dados do personagens aqui
						echo '<td>'.$valor.'</td>';
				}	
				//target abre uma nova janela chamando o link do personagem pelo seu id			
				echo '<td class="no-print"><a href="../index.php?pg=personagens&id='.$idpersonagematual.'" target="_blank">Link</a></td>';
				echo '</tr>';
			$linhaAtual++;
		}
	?>
</table>