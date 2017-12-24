<?php
	//verificar a senha e o login
	session_start(); //inicia a sessao

	header ("Content-type: text/html; charset=UTF-8");

	//verificar se a variavel existe
	if (isset($_SESSION["tentativas"]))
		$_SESSION["tentativas"]++;
	else
		$_SESSION["tentativas"] = 1;

	//verificar as tentativas
	if ($_SESSION["tentativas"] > 5) {
		echo "<script>alert('Você efetuou várias tentativas, tente novamente mais tarde.');history.back();
		</script>";
		exit;
	}

	//conectar no banco de dados
	include "conecta.php";

	//verificar se foi enviado post
	if ($_POST) {

		//recuperar os dados digitados
		$login = trim($_POST["login"]);
		$senha = trim($_POST["senha"]);
		//verificar se os campos foram preenchidos
		if ( empty($login) ){
			echo "<script>alert('Preencha o login');history.back();</script>";
			exit;
		} else if ( empty($senha) ) {
			echo "<script>alert('Preencha a senha');history.back();</script>";
			exit;
		} else {
			//se foi tudo preenchido
			//buscar usuario no banco
			$sql = "select * from sistema
			where login = ? limit 1";
			$consulta = $con->prepare($sql);
			$consulta->bindParam( 1, $login );
			$consulta->execute();
			//recuperar os dados do banco
			$dados = 
			$consulta->fetch( PDO::FETCH_OBJ );

			//criptografar a senha digitada
			$senha = md5($senha);

			if ( empty($dados->id) ) {
				echo "<script>alert('Usuáiro não encontrado');history.back();</script>";
				exit;
			} 
			else if ($senha != $dados->senha) {
				echo "<script>alert('Senha incorreta');history.back();
				</script>";
			} else {
				//gravar id, login, nome na sessao
				$_SESSION["login"] = $dados->login;
				$_SESSION["nome"] = $dados->nome;
				$_SESSION["id"] = $dados->id;
				//direciono a página home.php
				header("Location:home.php");
			}
		}
	} else {
		//se não foi dado post
		//direcionar a página para o index.php
		header( "Location: index.php" );
	}