<h1>Cadastro do Autor</h1>

<div class="pull-right">
	<a href="home.php?pg=autor"
	class="btn btn-primary" 
	title="Novo Cadastro">
		Novo Cadastro
	</a>

	<a href="home.php?pg=listarautor"
	class="btn btn-success" title="Listar">
		Listar
	</a>
</div>

<div class="clearfix"></div>


<?php
	//edição dos dados
	$id = $nome = $descricao = $foto =  "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar o autor
		$sql = "select * from autor
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

<form name="form1" method="post" novalidate action="home.php?pg=salvarautor" enctype="multipart/form-data" >
	<fieldset>
		<legend>Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" value="<?=$id;?>" readonly>

		<div class="control-group">
			<label for="nome" class="control-label"> Autor:</label>
			<div class="controls">
				<input type="text" required
				id="nome"
				name="nome"
				class="form-control" value="<?=$nome;?>" 
				data-validation-required-message="Preencha o Autor">
			</div>
		</div>

		<div class="control-group">
			<label for="descricao" class="control-label">Descrição do Autor:</label>
			<div class="controls">
				<textarea name="descricao"
				id="descricao" 
				class="form-control"
				rows="5" required
				value="<?=$descricao;?>"
				data-validation-required-message="Preencha a notícia" ><?=$descricao;?></textarea>
			</div>
		</div>

		<div class="control-group">
			<label for="control-label">
			Foto/Imagem:
			</label>
			<div class="controls">
				<input type="file" name="foto" class="form-control" value="<?=$foto;?>">
				(Selecione um arquivo JPG)
			</div>
		</div>

		<button type="submit" class="btn btn-success">Gravar/Atualizar</button>
	</fieldset>
</form>
