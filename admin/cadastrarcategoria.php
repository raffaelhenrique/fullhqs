<h1>Cadastro de Categoria</h1>

<div class="pull-right">
	<a href="home.php?pg=categoria"
	class="btn btn-primary" 
	title="Novo Cadastro">
		Novo Cadastro
	</a>

	<a href="home.php?pg=listarcategoria"
	class="btn btn-success" title="Listar">
		Listar
	</a>
</div>

<div class="clearfix"></div>


<?php
	//edição dos dados
	$id = $nome = "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar a categoria
		$sql = "select * from categoria
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

<form name="form1" method="post" novalidate action="home.php?pg=salvarcategoria" >
	<fieldset>
		<legend>* Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" value="<?=$id;?>" readonly>

		<div class="control-group">
			<label for="nome" class="control-label">* Categoria:</label>
			<div class="controls">
				<input type="text" required
				name="categoria"
				class="form-control" value="<?=$nome;?>" 
				data-validation-required-message="Preencha a Categoria">
			</div>
		</div>

		<button type="submit" class="btn btn-success">Gravar/Atualizar</button>
	</fieldset>
</form>
