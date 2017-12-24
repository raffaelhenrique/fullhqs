<h1>Cadastro da banner</h1>

<div class="pull-right">
	<a href="home.php?pg=banner"
	class="btn btn-primary" 
	title="Novo banner">
		Novos banner
	</a>

	<a href="home.php?pg=listarbanner"
	class="btn btn-success" title="Listar">
		Listar banner
	</a>
</div>

<div class="clearfix"></div>

<?php
	//edição dos dados
	$id = $titulo = $texto =  $foto =  "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar o banners
		$sql = "select * from banner where id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//separar os dados
		$id = $dados->id;
		$titulo= $dados->titulo;
		$texto = $dados->texto;
		$foto = $dados->foto;
		

	}
?>

<form name="form1" method="post" novalidate action="home.php?pg=salvarbanner" enctype="multipart/form-data">
	<fieldset>
		<legend>Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" readonly
		value="<?=$id;?>">

		

		

		<div class="control-group">
			<label for="titulo" class="control-label">Nome Da Foto:</label>
			<div class="controls">
				<input type="text" required
				id="titulo"
				name="titulo"
				class="form-control"
				data-validation-required-message="Preencha o nome"
				value="<?=$titulo;?>">
			</div>
		</div>
		
		<div class="control-group">
			<label for="texto" class="control-label">Texto:</label>
			<div class="controls">
				<input type="text" required
				id="texto"
				name="texto"
				class="form-control"
				data-validation-required-message="Preencha o nome"
				value="<?=$texto;?>">
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