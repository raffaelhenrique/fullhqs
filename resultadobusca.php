
<div class="container">
    <div class="row">
        <h1>Resultados da busca</h1><br>
        <?php
		//verifica se a posicao buscar existe no array do post
		if (!isset($_POST['buscar']) || empty($_POST['buscar'])){
					echo '<h2>Digite um valor a ser buscado.</h2>';
		}else{
			// .post[buscar] ele busca os dados da busca , e o busca e o nome qe ta no campo do formulario , o metodo e post , o % ele procura no campo da tabela com o nome refente.
		$sqlPer = "select * from personagens where nome like '%".$_POST['buscar']."%' ";
		//"or descricao like '%".$_POST['buscar']."%'";
		$consultaPer = $con->prepare($sqlPer);
		$consultaPer->execute();
		//aqui ele apresenta o resuldado da busca...
		$dadosPer = $consultaPer->fetchAll(PDO::FETCH_ASSOC);
		//retorna os registros associando as colunas do banco de dados ao array.[ ele converte a um array]
		
		$sqlHqs = "select hqs.*, personagens.foto as pfoto from hqs join personagens on personagens.id = hqs.id_personagens where hqs.titulo like '%".$_POST['buscar']."%' or personagens.nome like '%".$_POST['buscar']."%'  ";
		//"or px.descricao like '%".$_POST['buscar']."%'";
		//$sqlHqs = "select * from hqs where titulo like '%".$_POST['buscar']."%'";
		$consultaHqs = $con->prepare($sqlHqs);
		$consultaHqs->execute();

		$dadosHqs = $consultaHqs->fetchAll(PDO::FETCH_ASSOC);
		//fecthall assoc -> aqui ele retorna todos os registros obtidos ou null se nao houver mais registros
		
		//com o resultado do sql , aqui eu exibo os dados
		if (count($dadosPer) >0){ 
			echo "<h3 style='color:#fff';>Personagens</h3>";
			foreach($dadosPer as $coluna => $valor){
				echo '<h2><a href="./index.php?pg=personagens&id='.$valor['id'].'"><img width=100 height=100 src="./imagens/imgs/'.$valor['foto'].'" /> - '.$valor['nome'].'</a></h2>';
			}
		}
		// eese count e caso n retornar nenhum registro
		if (count($dadosHqs) >0){
			// e a linha separando os personagem 
			echo '<hr>';
			echo "<h3  style='color:#fff';>HQs</h3>";
			// $coluna e as colunas e a $valor e o valor
			foreach($dadosHqs as $colunax => $valorx){
				if (isset($_SESSION['logado']) && ($_SESSION['logado'] == true)){
					echo '<h2><a href="./index.php?pg=hqs&id='.$valorx['id_personagens'].'"><img width=100 height=100 src="./imagens/imgs/'.$valorx['foto'].'" /> - '.$valorx['titulo'].' - Edição: '.$valorx['edicao'].'</a> - <a href="./download.php?iddownload='.$valorx['id'].'&link='.$valorx['link'].'" target="_blank">Download PDF</a></h2>';
				}else{
					echo '<h2><a href="./index.php?pg=hqs&id='.$valorx['id_personagens'].'"><img width=100 height=100 src="./imagens/imgs/'.$valorx['foto'].'" /> - '.$valorx['titulo'].' - Edição: '.$valorx['edicao'].'</a> - <span style="font-size:12px;">Download PDF (Registre-se)</span></h2>';
				}
			}
		}
		//se nao existir nenhum personagem e nenhuma hq vai retornar essa mensagem
		if (count($dadosPer) == 0 && count($dadosHqs) == 0){
			echo '<h2>A busca por "'.$_POST['buscar'].'" não retornou nenhum resultado.</h2>';
		}
		
		
		
		
		}

        ?>
    </div><!-- /.row -->
</div>
