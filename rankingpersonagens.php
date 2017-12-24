<div class="container">
    <div class="row">
<h1>Ranking de Personagens</h1>
<div class="clearfix"></div>

<table class="table table-striped table-hover table-bordered" style="background-color:#ccc;">

<?php
$sql = "select 
	idpersonagem as \"Código Personagem\",
    p.nome as Persongem,
	count(1) as Acessos 
from paginasmovimento pm
	left join personagens p on p.id = pm.idpersonagem
	
where 
pm.idpersonagem <> 0 

group by 1

order by 3 desc";
// o left join Retorna todos os registros da tabela esquerda  e as correspondências que existirem com a tabela esqerda
		$consulta = $con->prepare($sql);
		//executo o sql
		$consulta->execute();
		
		$linhaAtual = 0;
		//gerar os dados na tela cabecalho
		while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			if ($linhaAtual == 0){
				echo '<thead>';
				foreach($dados as $coluna => $valor){
						if ($coluna != "Código Personagem"){
							echo '<th style="font-size:12px;">'.$coluna.'</th>';
						}
				}
				//aqui gero o cabecalho do link
				echo '<th style="font-size:12px;">Link</th>';
			echo '</thead>';
			}
				echo '<tr>';
				$idpersonagematual = 0;
				foreach($dados as $coluna => $valor){
						if ($coluna == "Código Personagem"){
						$idpersonagematual = $valor;
						// Armazena o Id do personagem para ser utilizado ao passar pela coluna perso. e acesso
						}else{
							echo '<td style="font-size:12px;">'.$valor.'</td>';
						}
				}			
				echo '<td style="font-size:12px;"><a href="./index.php?pg=personagens&id='.$idpersonagematual.'" target="_blank">Link</a></td>';
				echo '</tr>';
			$linhaAtual++;
		}
	?>
</table>
</div></div>