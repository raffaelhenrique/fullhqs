<?php
	//verificar se existe a var id
	if (isset($_GET["id"])) {

		//verificar se existe um categoris
		$id = trim($_GET["id"]);
		$sql = "select * from galeria where id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);

	$id = $dados->id;
    $foto = $dados->foto;
    unlink ($foto = "../imagens/imgs/" . $foto);

		if (empty($dados->plataforma_id)) {
			//excluir da tabela
			$sql = "delete from galeria
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
			include "listargaleria.php";

		} else {
			echo "<div class='alert alert-danger'>O registro não pode ser excluído pois existe um jogo com esta galeria</div>";
		}


	} else {
		echo "Erro ao excluir";
	}