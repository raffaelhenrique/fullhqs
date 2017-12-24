<h1>Listar Editora</h1>

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

<table class="table table-striped 
table-hover table-bordered">
	<thead>
		<th>ID</th>
		<th>Nome da Editora</th>
		<th width="15%">Opções</th>
	</thead>

	<?php
		//sql para selecionar as plataformas
		$sql = "select * from editora";
		$consulta = $con->prepare($sql);
		//executo o sql
		$consulta->execute();
		//gerar os dados na tela
		while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			//separar os dados
			$id = $dados->id;
			$nome = $dados->nome;
			//mostrar os dados na linha da tabela
			echo "<tr>
				<td>$id</td>
				<td>$nome</td>
				<th>
					<a 
					href='javascript:excluir($id)'
					class='btn btn-danger'>
						<i class='glyphicon glyphicon-trash'></i>
					</a>

					<a href='home.php?pg=editora&id=$id'
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
			location.href =	"home.php?pg=excluireditora&id="+id;
		}
	}
</script>