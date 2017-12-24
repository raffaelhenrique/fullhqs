<h1>Listar Galeria</h1>

<div class="pull-right">
	<a href="home.php?pg=galeria"
	class="btn btn-primary" 
	title="Novo Cadastro">
		Novo Cadastro
	</a>

	<a href="home.php?pg=listargaleria"
	class="btn btn-success" title="Listar">
		Listar galerias
	</a>
</div>

<div class="clearfix"></div>

<br>
<div class="clearfix"></div>

<table class="table table-striped 
table-hover table-bordered">
	<thead>
		<th>ID</th>
		<th>ID_Personagens</th>
		<th>Nome</th>
		<th>Foto</th>
		<th>Link</th>
		<th width="15%">Opções</th>
	</thead>

	<?php
		$busca = "";
		if (isset($_GET["busca"])) 
			$busca = trim($_GET["busca"]);
		//sql para selecionar as plataformas
		$sql = "select * from galeria ";
		$consulta = $con->prepare($sql);
		
		//executo o sql
		$consulta->execute();
		//gerar os dados na tela
		while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			//separar os dados
			$id = $dados->id;
			$id_personagens = $dados->id_personagens;
			$nome = $dados->nome;
			$foto = $dados->foto;
			$foto = "../imagens/imgs/" . $foto;
			$link = $dados->link;
// $foto = $foto . ".jpg";

			//mostrar os dados na linha da tabela
			echo "<tr>
				<td>$id</td>
				<td>$id_personagens</td>
				<td>$nome</td>
				<td>
				<img src='$foto' width='100px'>
				</td>
				<td>$link</td>
				<th>
					<a 
					href='javascript:excluir($id)'
					class='btn btn-danger'>
						<i class='glyphicon glyphicon-trash'></i>
					</a>
					
					<a href='home.php?pg=galeria&id=$id'
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
			location.href =	"home.php?pg=excluirgaleria&id="+id;
		}
	}
</script>