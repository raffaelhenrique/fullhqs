<h1>Cadastro de Editora</h1>

<div class="pull-right">
	<a href="home.php?pg=editora"
	class="btn btn-primary" 
	title="Novo Cadastro">
		Novo Cadastro
	</a>

	<a href="home.php?pg=listareditora"
	class="btn btn-success" title="Listar">
		Listar
	</a>
</div>

<div class="clearfix"></div>


<?php
	//edição dos dados
	$id = $editora = "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar a editora
		$sql = "select * from editora
			where id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//separar os dados
		$id = $dados->id;
		$nome = $dados->nome;
		
	}
?>

<form name="form1" method="post" novalidate
action="home.php?pg=salvareditora" >
	<fieldset>
		<legend>Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" value="<?=$id;?>" readonly>

		<div class="control-group">
			<label for="nome" class="control-label"> Editora:</label>
			<div class="controls">
				<input type="text" required
				name="editora"
				class="form-control" value="<?=$editora;?>" 
				data-validation-required-message="Preencha a editora">
			</div>
		</div>

		<button type="submit" class="btn btn-success">Gravar/Atualizar</button>
	</fieldset>
</form>
