<h1>Cadastro De Post</h1>

<div class="pull-right">
	<a href="home.php?pg=post"
	class="btn btn-primary" 
	title="Novo post">
		Novos post
	</a>

	<a href="home.php?pg=listarpost"
	class="btn btn-success" title="Listar">
		Listar Post
	</a>
</div>

<div class="clearfix"></div>

<?php
	//edição dos dados
	$id = $id_usuario = $titulo = $resumo = $noticia = $data = $foto = "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar o noticias
		$sql = "select * from post where id = ? ";
			
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//separar os dados
		  		$id = $dados->id;
                
                $id_usuario = $dados->id_usuario;
                $titulo = $dados->titulo;
                $resumo = $dados->resumo;
                $noticia = $dados->noticia;
                $data = $dados->data;
                $foto = $dados->foto;
	}
?>

<form name="form1" method="post" novalidate action="home.php?pg=salvarpost" enctype="multipart/form-data">
	<fieldset>
		<legend>Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" readonly
		value="<?=$id;?>">

		<div class="control-group">
			<label for="nome" class="control-label">Titulo</label>
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
			<label for="nome" class="control-label">Resumo da Noticia:</label>
			<div class="controls">
				<textarea name="resumo"
				id="resumo" 
				class="form-control"
				rows="5" required
				data-validation-required-message="Preencha a notícia" ><?=$resumo;?></textarea>
			</div>
		</div>

			<div class="control-group">
			<label for="nome" class="control-label">Noticia:</label>
			<div class="controls">
				<textarea name="noticia"
				id="noticia" 
				class="form-control"
				rows="5" required
				value="<?=$noticia;?>"
				data-validation-required-message="Preencha a notícia" ><?=$noticia;?></textarea>
			</div>
		</div>

	<div class="control-group">
			<label class="control-label"> Data:</label>
			<div class="controls">
				<input type="text"
				name="data" required
				data-validation-required-message="Preencha a data"
				value="<?=$data;?>"
				class="form-control"
				data-mask="99/99/9999">
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
			<label for="id_usuario" class="control-label">Escolha o Usuario:</label>
			<div class="controls">
				<select type="text" required
				id="id_usuario"
				name="id_usuario"
				class="form-control"
				data-validation-required-message="Preencha a editora"
				value="<?=$id_usuario;?>">
				<option value=""></option>
				<?php

				$sql = "select * from usuario_sistema";
				$consulta = $con->prepare($sql);
				$consulta->execute();
				//verifica se foi enviado id por get
				while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
					//separar os dados
					$id = $dados->id;
					$login = $dados->login;

					echo "<option value='$id'>$login</option>";

				}
			?>
			</select>
			</div>
		</div>
		
		<script type="text/javascript">
		$("#id_usuario").val(<?=$id_usuario;?>);
		</script>



		

                
           <button type="submit" class="btn btn-success">Gravar/Atualizar</button>
	</fieldset>
</form>