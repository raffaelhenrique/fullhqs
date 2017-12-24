<?php
	//verificar se foi dado post
	if ($_POST) {
		//se foi - salvar/alterar

		//recuperar os dados enviados
		$id = trim($_POST["id"]);
		$nome = trim($_POST["nome"]);
		$login = mb_strtolower(trim($_POST["login"]));
		$senha = password_hash(trim($_POST["senha"]), PASSWORD_DEFAULT);
		

		//montar o sql para inserir ou atualizar
		if (empty($id)) {
			//inserir
			$sql = "insert into usuario_sistema values
			(NULL, ? , ? , ?)";
			//NULL, nome, cpf, telefone
		} else {
			//atualizar
			$sql = "update usuario_sistema set nome = ?, login = ?, senha = ?
			where id = ? limit 1";
		}
		//executar
		$consulta = $con->prepare($sql);
		//passar os parametros
		$consulta->bindParam(1,$nome);
		$consulta->bindParam(2,$login);
		$consulta->bindParam(3,$senha);
		
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