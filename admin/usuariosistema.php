<h1>Cadastro de usuario sistemas</h1>

<div class="pull-right">
	<a href="home.php?pg=usuariosistema"
	class="btn btn-primary" 
	title="Novo usuariosistema">
		Novo usuario sistema
	</a>

	<a href="home.php?pg=listarusuariosistema"
	class="btn btn-success" title="Listar">
		Listar usuario sistemas
	</a>
</div>

<div class="clearfix"></div>

<?php
	//edição dos dados
	$id = $nome = $login = $senha = "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar o usuario_sistemas
		$sql = "select * from usuario_sistema where id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//separar os dados
		$id = $dados->id;
		$nome = $dados->nome;
		$login = $dados->login;
		$senha = $dados->senha;
	}
?>

<form name="form1" method="post" novalidate action="home.php?pg=salvarusuariosistema" >
	<fieldset>
		<legend>Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" readonly
		value="<?=$id;?>">

		<div class="control-group">
			<label for="nome" class="control-label">Nome Do Administrador:</label>
			<div class="controls">
				<input type="text" required
				id="nome"
				name="nome"
				class="form-control"
				data-validation-required-message="Preencha o nome"
				value="<?=$nome;?>">
			</div>
		</div>

		<div class="control-group">
			<label for="login" class="control-label">Login:</label>
			<div class="controls">
                            <input type="text" required id="login"
				name="login" class="form-control"
				data-validation-required-message="Preencha o nome do usuario_sistema"
				value="<?=$login;?>">
			</div>
                        
		</div>
                
                
		<div class="control-group">
			<label for="senha" class="control-label">senha:</label>
			<div class="controls">
				<input type="password" required
				name="senha"
				class="form-control"
				data-validation-required-message="Preencha a senha"
				value="<?=$senha;?>">
			</div>
		</div>

	
		<button type="submit" class="btn btn-success">Gravar/Atualizar</button>
	</fieldset>
</form>