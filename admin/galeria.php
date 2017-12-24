<h1>Cadastro da Galeria</h1>

<div class="pull-right">
	<a href="home.php?pg=galeria"
	class="btn btn-primary" 
	title="Novo galeria">
		Novos galeria
	</a>

	<a href="home.php?pg=listargaleria"
	class="btn btn-success" title="Listar">
		Listar galeria
	</a>
</div>

<div class="clearfix"></div>

<?php
	//edição dos dados
	$id = $id_personagens = $nome =  $foto = $link =  "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar o galerias
		$sql = "select * from galeria where id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//separar os dados
		$id = $dados->id;
		$id_personagens= $dados->id_personagens;
		$nome = $dados->nome;
		$foto = $dados->foto;
		$link = $dados->link;

	}
?>

<form name="form1" method="post" novalidate action="home.php?pg=salvargaleria" enctype="multipart/form-data">
	<fieldset>
		<legend>Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" readonly
		value="<?=$id;?>">

		

		<div class="control-group">
			<label for="id_personagens" class="control-label">Seleciona os Personagens:</label>
			<div class="controls">
				<select type="text" required
				id="id_personagens"
				name="id_personagens"
				class="form-control"
				data-validation-required-message="Escolha o seu Autor"
				value="<?=$id_personagens;?>">
				<option value=""></option>
				
				<?php

				$sql = "select * from personagens";
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
$("#id_personagens").val(<?=$id_personagens;?>);
		</script>

		<div class="control-group">
			<label for="nome" class="control-label">Nome Da Foto:</label>
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
			<label for="control-label">
			Foto/Imagem:
			</label>
			<div class="controls">
				<input type="file" name="foto" class="form-control" value="<?=$foto;?>">
				(Selecione um arquivo JPG)
			</div>
		</div>
		

		<div class="control-group">
			<label for="link" class="control-label">Link:</label>
			<div class="controls">
				<input type="text" required
				id="link"
				name="link"
				class="form-control"
				data-validation-required-message="Preencha o link"
				value="<?=$link;?>">
			</div>
		</div>

                
                
		

		<button type="submit" class="btn btn-success">Gravar/Atualizar</button>
	</fieldset>
</form>