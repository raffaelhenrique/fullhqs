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
//o as e o apelido de coluna , o titulo fico vazio porqe no laço vou substituir ele .
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
	
		$linhaAtual = 0; // so um contador
		//monsta o cabeçalho do relatorio
		//ele qe vai listar todos os registros do relario
		while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			if ($linhaAtual == 0){
				echo '<thead>';
				foreach($dados as $coluna => $valor){
					//talvez nem precise
					if ($linhaAtual == 0){
						echo '<th>'.$coluna.'</th>';
					}
				}
				echo '<th class="no-print">Link</th>';
			echo '</thead>';
			}
				
				echo '<tr>';
				// aqui vai ser a linha 
				$idpersonagematual = 0;
				$acessos = 1;
				//lista os registros do relatorio
				foreach($dados as $coluna => $valor){

						// if de tratamento da coluna titulo
						if ($coluna == "Código Personagem"){
						// Armazena o Id do personagem para ser utilizado ao passar pela coluna Titulo e no link
							$idpersonagematual = $valor;
						}
						// Processa e insere os dados na coluna titulo
						if ($coluna == "Titulo"){
							$sqlHQ = "SELECT id, titulo, edicao FROM `hqs` WHERE id_personagens = ".$idpersonagematual;
							//o ponto eu to juntando o numerico com a string , contatenando
							$consultaHQ = $con->prepare($sqlHQ);
							$consultaHQ->execute();
							$dadosHQ = $consultaHQ->fetchAll(PDO::FETCH_OBJ);
							
							
							
							// mostra todos os dados da hqs e dowloads
							echo '<td>';
							//td e a coluna
								foreach($dadosHQ as $colunax => $valorx){
									$sqlHQEp = "select count(1) as Download from paginasmovimento where iddownload = ".$valorx->id;
									$consultaHQEp = $con->prepare($sqlHQEp);
									$consultaHQEp->execute();
									$dadosHQEp = $consultaHQEp->fetch(PDO::FETCH_OBJ);
									echo ' HQ: '.$valorx->id.' - '.$valorx->titulo.' - Edição: '.$valorx->edicao.' - Downloads ('.$dadosHQEp->Download.')<br />';
								}
							echo '</td>';
						}else{
							echo '<td>'.$valor.'</td>';
						}
				}
				//essas linha ela o link da hqs , o blank abre uma janela (alvo)
				echo '<td class="no-print"><a href="../index.php?pg=hqs&id='.$idpersonagematual.'" target="_blank">Link</a></td>';
				echo '</tr>';
				//fecho linha todas elas
			$linhaAtual++;
		}
	?>
</table>