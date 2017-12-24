<h1>Cadastro De Personagens</h1>

<div class="pull-right">
	<a href="home.php?pg=personagens"
	class="btn btn-primary" 
	title="Novo personagens">
		Novos personagens
	</a>

	<a href="home.php?pg=listarpersonagens"
	class="btn btn-success" title="Listar">
		Listar personagens
	</a>
</div>

<div class="clearfix"></div>

<?php
	//edição dos dados
	$id = $id_editora = $nome =  $descricao = $foto = "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar o personagenss
		$sql = "select * from personagens where id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//separar os dados
		$id = $dados->id;
		$id_editora = $dados->id_editora;
		$nome = $dados->nome;
		$descricao = $dados->descricao;
		$foto = $dados->foto;
	}
?>

<form name="form1" method="post" novalidate action="home.php?pg=salvarpersonagens" enctype="multipart/form-data">
	<fieldset>
		<legend>Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" readonly
		value="<?=$id;?>">

		<div class="control-group">
			<label for="nome" class="control-label">Nome Do Personagem:</label>
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
			<label for="id_editora" class="control-label">Escolha a Editora:</label>
			<div class="controls">
				<select type="text" required
				id="id_editora"
				name="id_editora"
				class="form-control"
				data-validation-required-message="Preencha a editora"
				value="<?=$id_editora;?>">
				<option value=""></option>
				<?php

				$sql = "select * from editora";
				$consulta = $con->prepare($sql);
				$consulta->execute();
				//verifica se foi enviado id por get
				while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
					//separar os dados
					$id = $dados->id;
					$nome = $dados->nome;

					echo "<option value='$id'>$nome</option>";

				}
			?>
			</select>
			</div>
		</div>
		<script type="text/javascript">
$("#id_editora").val(<?=$id_editora;?>);
		</script>


		<div class="control-group">
			<label for="descricao" class="control-label">Descrição Do Personagem:</label>
			<div class="controls">
				<textarea name="descricao"
				class="form-control"
				rows="5" required
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