<h1>Listar Noticia</h1>

<div class="pull-right">
	<a href="home.php?pg=noticia"
	class="btn btn-primary" 
	title="Novo Cadastro">
		Novo Cadastro
	</a>

	<a href="home.php?pg=listarnoticia"
	class="btn btn-success" title="Listar">
		Listar Noticias
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
		<th>Resumo</th>
		<th>Noticia</th>
		<th>Data</th>
		<th>ID_Usuarios</th>
		<th>Foto</th>
		<th width="15%">Opções</th>
	</thead>

	<?php
		$busca = "";
		if (isset($_GET["busca"])) 
			$busca = trim($_GET["busca"]);
		//sql para selecionar as plataformas
		$sql = "select
        n.id,
        u.login usuario,
        n.titulo titulo,
        n.resumo resumo,
        n.noticia noticia,
        date_format(n.data,'%d/%m/%Y') data,
                n.foto foto
        from noticia n
        inner join usuario_sistema u on (n.id_usuario = u.id) 
        order by n.data desc";
		
                       
		$consulta = $con->prepare($sql);
		$consulta->execute();
		//gerar os dados na tela
		while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
			//separar os dados
			$id = $dados->id;
			
			$id_usuario = $dados->usuario;
			$titulo = $dados->titulo;
			$resumo = $dados->resumo;
			$noticia = $dados->noticia;
			$data= $dados->data;
			$foto = $dados->foto;
			$foto = "../imagens/imgs/" . $foto;


			//mostrar os dados na linha da tabela
			
			//$foto = "../imagem/".$foto."p.jpg";
			
		    

			echo "<tr>
				<td>$id</td>
				<td>$titulo</td>
				<td>$resumo</td>
				<td>$noticia</td>
				<td>$data</td>
				<td>$id_usuario</td>
				<td>
				<img src='$foto' width='100px'>
				</td>
				<th>
					<a 
					href='javascript:excluir($id)'
					class='btn btn-danger'>
						<i class='glyphicon glyphicon-trash'></i>
					</a>
					
					<a href='home.php?pg=noticia&id=$id'
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
			location.href =	"home.php?pg=excluirnoticia&id="+id;
		}
	}
</script>