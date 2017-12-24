<h1>Cadastro de Hqs</h1>

<div class="pull-right">
	<a href="home.php?pg=hqs"
	class="btn btn-primary" 
	title="Novo hqs">
		Novas hqs
	</a>

	<a href="home.php?pg=listarhqs"
	class="btn btn-success" title="Listar">
		Listar HQs
	</a>
</div>

<div class="clearfix"></div>

<?php
	//edição dos dados
	$id = $titulo = $edicao = $id_editora = $id_autor = $id_categoria = $id_usuario = $id_personagens = $foto = $link = "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar o hqs
		$sql = "select * from hqs where id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//separar os dados
		$id = $dados->id;
		$titulo = $dados->titulo;
		$edicao = $dados->edicao;
		

		$id_editora = $dados->id_editora;
		$id_autor = $dados->id_autor;
		$id_categoria = $dados->id_categoria;
		$id_usuario = $dados->id_usuario;
		$id_personagens = $dados->id_personagens;
		$foto = $dados->foto;
		$foto = "../imagens/imgs/" . $foto;
		$link = $dados->link;

		

	}
?>

<form name="form1" method="post" novalidate action="home.php?pg=salvarhqs" enctype="multipart/form-data" >
	<fieldset>
		<legend>Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" readonly
		value="<?=$id;?>">

		<div class="control-group">
			<label for="titulo" class="control-label">Titulo:</label>
			<div class="controls">
                            <input type="text" required id="titulo"
				name="titulo" class="form-control"
				data-validation-required-message="Preencha o nome do hqs"
				value="<?=$titulo;?>">
			</div>
                        
		</div>
                
                
		<div class="control-group">
			<label for="edicao" class="control-label">Edicao:</label>
			<div class="controls">
				<input type="text" required
				name="edicao"
				class="form-control"
				data-validation-required-message="Preencha a senha"
				value="<?=$edicao;?>">
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
			<label for="id_autor" class="control-label">Escolha o Autor:</label>
			<div class="controls">
				<select type="text" required
				id="id_autor"
				name="id_autor"
				class="form-control"
				data-validation-required-message="Escolha o seu Autor"
				value="<?=$id_autor;?>">
				<option value=""></option>
				
				<?php

				$sql = "select * from autor";
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
$("#id_autor").val(<?=$id_autor;?>);
		</script>

		<div class="control-group">
			<label for="id_categoria" class="control-label">Escolha a Categoria:</label>
			<div class="controls">
				<select type="text" required
				id="id_categoria"
				name="id_categoria"
				class="form-control"
				data-validation-required-message="Escolha o seu Autor"
				value="<?=$id_categoria;?>">
				<option value=""></option>
				
				<?php

				$sql = "select * from categoria";
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
$("#id_categoria").val(<?=$id_categoria;?>);
		</script>	
		
		<div class="control-group">
			<label for="id_usuario" class="control-label">Seleciona o Usuario:</label>
			<div class="controls">
				<select type="text" required
				id="id_usuario"
				name="id_usuario"
				class="form-control"
				data-validation-required-message="Escolha o seu usuario"
				value="<?=$id_usuario;?>">
				<option value=""></option>
				
				<?php

				$sql = "select * from usuario";
				$consulta = $con->prepare($sql);
				$consulta->execute();
				//verifica se foi enviado id por get
				while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
					//separar os dados
					$id = $dados->id;
					$login = $dados->login;
					$senha = $dados->senha;

					echo "<option value='$id'>$login</option>";

				}
			?>
		</select>

			</div>
		</div>		
		<script type="text/javascript">
$("#id_usuario").val(<?=$id_usuario;?>);
		</script>
		
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
					$descricao = $dados->descricao;

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
                            <input type="text" required id="link"
				name="link" class="form-control"
				data-validation-required-message="Preencha o link"
				value="<?=$link;?>">
			</div>
                        
		</div>

		

		<button type="submit" class="btn btn-success">Gravar/Atualizar</button>
	</fieldset>
</form>