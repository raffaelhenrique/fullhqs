<h1>Cadastro de contatos</h1>

<div class="pull-right">
	<a href="home.php?pg=contato"
	class="btn btn-primary" 
	title="Novo contato">
		Novo contato
	</a>

	<a href="home.php?pg=listarcontato"
	class="btn btn-success" title="Listar">
		Listar contatos
	</a>
</div>

<div class="clearfix"></div>

<?php
	//edição dos dados
	$id = $nome = $email = $mensagem = "";
	//verifica se foi enviado id por get
	if (isset($_GET["id"])) {
		$id = trim($_GET["id"]);
		//sql para selecionar o contatos
		$sql = "select * from contato where id = ? limit 1";
		$consulta = $con->prepare($sql);
		$consulta->bindParam(1,$id);
		$consulta->execute();
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//separar os dados
		$id = $dados->id;
		$nome = $dados->nome;
		$email = $dados->email;
		$mensagem = $dados->mensagem;
	}
?>

<form name="form1" method="post" novalidate action="home.php?pg=salvarcontato" >
	<fieldset>
		<legend>Campo obrigatório</legend>

		<input type="hidden" name="id"
		class="form-control" readonly
		value="<?=$id;?>">

		<div class="control-group">
			<label for="nome" class="control-label">Nome:</label>
			<div class="controls">
                            <input type="text" required id="nome"
				name="nome" class="form-control"
				data-validation-required-message="Preencha o nome "
				value="<?=$nome;?>">
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

			<div class="control-group">
			<label for="nome" class="control-label">Mensagem:</label>
			<div class="controls">
				<textarea name="mensagem"
				id="mensagem" 
				class="form-control"
				rows="5" required
				value="<?=$mensagem;?>"
				data-validation-required-message="Preencha a notícia" ><?=$mensagem;?></textarea>
			</div>
		</div>

		<button type="submit" class="btn btn-success">Gravar/Atualizar</button>
	</fieldset>
</form>