<?php
	//verificar se existe a var id
	if (isset($_GET["id"])) {

		//verificar se existe um jogo com esta categoria
		$id = trim($_GET["id"]);
		$sql = "select * from jogo where categoria_id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);

		if (empty($dados->plataforma_id)) {
			//excluir da tabela
			$sql = "delete from categoria
			where id = ? limit 1";
			$consulta = $con->prepare($sql);
			$consulta->bindParam(1,$id);
			//verificar se executa
			if ($consulta->execute()) {
				//executou
				echo "<div class='alert alert-success'>Registro Excluído com Sucesso
					</div>";	
			} else {
				//erro
				echo "<div class='alert alert-danger'>Erro ao excluir</div>";
			}
			
			//incluir a listagem novamente
			include "listarcategoria.php";

		} else {
			echo "<div class='alert alert-danger'>O registro não pode ser excluído pois existe um jogo com esta categoria</div>";
		}


	} else {
		echo "Erro ao excluir";
	}