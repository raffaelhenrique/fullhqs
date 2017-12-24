<?php
	//verificar se foi dado post
	if ($_POST) {
		//se foi - salvar/alterar

		//recuperar os dados enviados
		$id = trim($_POST["id"]);
		$nome = trim($_POST["nome"]);
		$email = trim($_POST["email"]);
		$mensagem = trim($_POST["mensagem"]);


		//montar o sql para inserir ou atualizar
		if (empty($id)) {
			//inserir
			$sql = "insert into contato values
			(NULL, ? , ? , ?)";
			//NULL, nome, cpf, telefone
		} else {
			//atualizar
			$sql = "update contato set nome = ?, email = ?, mensagem = ?
			where id = ? limit 1";
		}
		//executar
		$consulta = $con->prepare($sql);
		//passar os parametros
		$consulta->bindParam(1,$nome);
		$consulta->bindParam(2,$email);
		$consulta->bindParam(3,$mensagem);
		
		if (!empty($id))
			$consulta->bindParam(4,$id);
		//verificar se executa
                
		if ($consulta->execute()) {
			echo "<div class='alert alert-success'>Registro Salvo/Alterado com sucesso!</div>";
		} else {
			echo "<div class='alert alert-danger'>Erro ao Salvar/Alterar</div>";
                        
		}

	} else {
		//se não foi - erro
		echo "<div class='alert alert-danger'>
		Erro ao acessar página</div>";
	}