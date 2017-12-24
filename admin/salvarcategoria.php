<?php
	
	if ($_POST) {
		//recuperar os dados enviados
		$id = trim($_POST["id"]);
		$categoria = trim($_POST["categoria"]);

		//verificar se a plataforma foi preenchida
		if (empty($categoria)) {
			echo "<div class='alert alert-danger'>Preencha a categoria</div>";
		} else {

			//se o id for vazio - insere
			if (empty($id)) {
				$sql = "insert into 
					categoria (id, nome)
					values (NULL, ?)";
			} else {
				//se for atualizar
				$sql = "update categoria
					set nome = ? where id = ?
					limit 1";
			}
			$consulta = $con->prepare($sql);
			$consulta->bindParam(1,$categoria);
                        if (!empty($id)){ $consulta->bindParam(2,$id);}
			//verificar se executou
			if ($consulta->execute()) {
				//mensagem de sucesso
				echo "<div class='alert alert-success'>Registro salvo com sucesso!</div>";
			} else {
				//mensagem de erro
				echo "<div class='alert alert-danger'>Erro ao Salvar.
				</div>";
			}

		}


	} else {
		//mensagem de erro
		echo "<div class='alert alert-danger'>
		Erro ao acessar arquivo!</div>";
	}