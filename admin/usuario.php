<h1>Cadastro de Usuarios</h1>

<div class="pull-right">
	<a href="home.php?pg=usuario"
	class="btn btn-primary" 
	title="Novo usuario">
		Novo usuario
	</a>

	<a href="home.php?pg=listarusuario"
	class="btn btn-success" title="Listar">
		Listar usuarios
	</a>
</div>

<div class="clearfix"></div>

<?php
	//edição dos dados
	$id = $login = $senha = $email = "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar o usuarios
		$sql = "select * from usuario where id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//separar os dados
		$id = $dados->id;
		$login = $dados->login;
		$senha = $dados->senha;
		$email = $dados->email;
	}
?>

<form name="form1" method="post" novalidate action="home.php?pg=salvarusuario" >
	<fieldset>
		<legend>Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" readonly
		value="<?=$id;?>">

		<div class="control-group">
			<label for="login" class="control-label">Login:</label>
			<div class="controls">
                            <input type="text" required id="login"
				name="login" class="form-control"
				data-validation-required-message="Preencha o nome do usuario"
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

		<div class="control-group">
			<label for="email" class="control-label">Email:</label>
			<div class="controls">
                            <input type="email" required id="email"
				name="email" class="form-control"
				data-validation-required-message="Preencha o email"
				placeholder="Digite um email valido"
				value="<?=$email;?>">
			</div>
                        
		</div>

		<button type="submit" class="btn btn-success">Gravar/Atualizar</button>
	</fieldset>
</form>