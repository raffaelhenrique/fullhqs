<h1>Listar HQs</h1>

<div class="pull-right">
	<a href="home.php?pg=hqs"
	class="btn btn-primary" 
	title="Novo Cadastro">
		Novo Cadastro
	</a>

	<a href="home.php?pg=listarhqs"
	class="btn btn-success" title="Listar">
		Listar HQs
	</a>
</div>

<div class="clearfix"></div>

<br>
<div class="clearfix"></div>

<table class="table table-striped 
table-hover table-bordered">
	<thead>
		<th>ID</th>
		<th>Titulo</th>
		<th>Edicao</th>
		<th>Editora</th>
		<th>Autor</th>
		<th>Categoria</th>
		<th>Usuario</th>
		<th>Personagens</th>
		<th>Foto</th>
		<th>Link</th>
		<th width="10%">Opções</th>
	</thead>

	
	
	<?php
		$busca = "";
		if (isset($_GET["busca"])) 
			$busca = trim($_GET["busca"]);
		//sql para selecionar as plataformas
		$sql = "select
                        h.id,
                        h.titulo,
                        h.edicao,
                        h.link,
                        h.foto foto,
                        e.nome editora,
                        a.nome autor,
                        c.nome categoria,
                        u.login usuario,
                        p.nome personagens
                        from hqs h
                        inner join editora e on (h.id_editora = e.id)
                        inner join autor a on (h.id_autor = a.id)
                        inner join categoria c on (h.id_categoria = c.id)
                        inner join usuario u on (h.id_usuario = u.id)
                        inner join personagens p on (h.id_personagens = p.id)
                        order by h.titulo desc";
		$consulta = $con->prepare($sql);
		
		
		//executo o sql
		$consulta->execute();
		//gerar os dados na tela
		while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			//separar os dados
			$id = $dados->id;
			$titulo = $dados->titulo;
			$edicao = $dados->edicao;
			$id_editora = $dados->editora;
			$id_autor = $dados->autor;
			$id_categoria = $dados->categoria;
			$id_usuario = $dados->usuario;
			$id_personagens = $dados->personagens;
			$foto = $dados->foto;
			$foto = "../imagens/imgs/" . $foto;
		    
			$link = $dados->link;


			
           						

			

			//mostrar os dados na linha da tabela
			echo "<tr>
				<td>$id</td>
				<td>$titulo</td>
				<td>$edicao</td>
				<td>$id_editora</td>
				<td>$id_autor</td>
				<td>$id_categoria</td>
				<td>$id_usuario</td>
				<td>$id_personagens</td>

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
					
					<a href='home.php?pg=hqs&id=$id'
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
			location.href =	"home.php?pg=excluirhqs&id="+id;
		}
	}
</script>