<h1>Listar Contato</h1>

<div class="pull-right">
	<a href="home.php?pg=contato"
	class="btn btn-primary" 
	title="Novo Cadastro">
		Novo Cadastro
	</a>

	<a href="home.php?pg=listarcontato"
	class="btn btn-success" title="Listar">
		Listar contatos
	</a>
</div>

<div class="clearfix"></div>

<br>
<div class="clearfix"></div>

<table class="table table-striped 
table-hover table-bordered">
	<thead>
		<th>ID</th>
		<th>nome</th>
		<th>email</th>
		<th>mensagem</th>
		<th width="15%">Opções</th>
	</thead>

	<?php
		$busca = "";
		if (isset($_GET["busca"])) 
			$busca = trim($_GET["busca"]);
		//sql para selecionar as plataformas
		$sql = "select * from contato ";
		$consulta = $con->prepare($sql);
		
		//executo o sql
		$consulta->execute();
		//gerar os dados na tela
		while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			//separar os dados
			$id = $dados->id;
			$nome = $dados->nome;
			$email = $dados->email;
			$mensagem = $dados->mensagem;

			//mostrar os dados na linha da tabela
			echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<td>$email</td>
				<td>$mensagem</td>
				<th>
					<a 
					href='javascript:excluir($id)'
					class='btn btn-danger'>
						<i class='glyphicon glyphicon-trash'></i>
					</a>
					
					<a href='home.php?pg=contato&id=$id'
					class='btn btn-primary'>
						<i class='glyphicon glyphicon-pencil'></i>
					</a>
				</td>
			</tr>";
		}
	?>
</table>

<script type="text/javascript">
	function excluir(id) {
		if (confirm("Deseja mesmo excluir este registro?")) {
			//direcionar para a pagina de exclusão de dados
			location.href =	"home.php?pg=excluircontato&id="+id;
		}
	}
</script>