<div class="container">
    <div class="row">
<h1>Ranking de HQS</h1>
<div class="clearfix"></div>

<table class="table table-striped table-hover table-bordered" style="background-color:#ccc;">

<?php
// Utilizado o campo titulo para ser preenchido pelo SQL abaixo no "if da coluna linha 51"
$sql = "select 
	pm.idhq as \"Código Personagem\",
	px.nome as Nome,
	'' as Titulo,
	count(1) as \"Acessos Das HQs\"
	
from paginasmovimento pm
left join personagens px on px.id = pm.idhq 

where pm.idhq <> 0
group by 1
 
order by 4 desc";
//esse count ele ja faz ligacao direta com a pagina de movinento ecom o where se for diferente de 0 , 
// a pm.idhq ja vai agrupar os personagens em 1 e ordenar os acessos pelo que tiver mais acessos
//group by 1 , agrupa os nomes do personagem na hora do acesso em um lugar so tipo de o deadp tiver 3 acessos
//ele ira colocar so 1 nome do deadpool e os 3 acessos.
//LIKE combinado com os caracteres especiais porcentagem .


		$consulta = $con->prepare($sql);
		//executo o sql
		$consulta->execute();
		//gerar os dados na tela
		
		$linhaAtual = 0;
		while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			// Aqui começa o cabeçalho
			if ($linhaAtual == 0){
				echo '<thead><tr>';
					foreach($dados as $coluna => $valor){
							// Exibe as colunas diferentes de codigo do personagem
							if ($coluna != "Código Personagem"){
								echo '<th style="font-size:12px;">'.$coluna.'</th>';
							}
					}
				echo '<th style="font-size:12px;">Link</th>';
				echo '</tr></thead>';
			}
			//-------------ate aqui o cabecalho ---------------------//
				echo '<tr>';
				$idpersonagematual = 0;
				$acessos = 1;

				foreach($dados as $coluna => $valor){

						if ($coluna == "Código Personagem"){
							// Armazena o Id do personagem para ser utilizado ao passar pela coluna Titulo e no link
							$idpersonagematual = $valor;
						}
					
						// if de tratamento da coluna titulo
						if ($coluna == "Titulo"){

							// Busca o Titulo, Id e Edição da HQ
							//no titulo foi necessario fazer outro sql pra tratar a coluna titulo

							$sqlHQ = "SELECT id, titulo, edicao FROM `hqs` WHERE id_personagens = ".$idpersonagematual;
							$consultaHQ = $con->prepare($sqlHQ);
							$consultaHQ->execute();
							$dadosHQ = $consultaHQ->fetchAll(PDO::FETCH_OBJ);
							echo '<td style="font-size:12px;">';

								// Busca os downloads da HQ atual
								//continuacao da coluna titulo.
								foreach($dadosHQ as $colunax => $valorx){
									$sqlHQEp = "select count(1) as Downloads from paginasmovimento where iddownload = ".
									$valorx->id;
									$consultaHQEp = $con->prepare($sqlHQEp);
									$consultaHQEp->execute();
									$dadosHQEp = $consultaHQEp->fetch(PDO::FETCH_OBJ);

									echo ' HQ: '.$valorx->id.' - '.$valorx->titulo.' - Edição: '.$valorx->edicao.' - Downloads das HQs ('.$dadosHQEp->Downloads.')<br />';
								}
							echo '</td>';


						}else{
							// Se a coluna for diferente de Codigo do personagem
							if ($coluna != "Código Personagem"){
								// Escreve o valor das colunas diferentes de Titulo, Codigo Personagem
								echo '<td style="font-size:12px;">'.$valor.'</td>';
							}
						}
				}
				// Gera o link de acesso da HQ no relatorio , o target abre uma nova janela 
				echo '<td style="font-size:12px;"><a href="./index.php?pg=hqs&id='.$idpersonagematual.'" target="_blank">Link</a></td>';
				echo '</tr>';
			//aqui vai acrecenstando o link em todas as td consecutivas das colunas , tr e a linha e td e cada celula
			$linhaAtual++;
			//aqui e o final
		}
	?>
</table>
</div></div>