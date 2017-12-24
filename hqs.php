<?php

// recuperando os dados do id
$id = $_GET["id"];

require_once 'coleta.php';
coletarDadosPagina($con, $_SERVER['REQUEST_URI'],$id);

$sql = "select * from personagens where id = " . (int) $id . " limit 1";
$consulta = $con->prepare($sql);
$consulta->execute();
?>

<div class="container">
    <div class="row">
        <h1>HQS</h1>
        <?php
		
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
            			where id_personagens = " . (int) $id . " order by titulo, edicao  asc";;
       // $sql = "select * from hqs where id_personagens = " . (int) $id;
        //$sql = "select * from personagens where id = ".(int)$id;
        $consulta = $con->prepare($sql);
        $consulta->execute();

        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            $id = $dados->id;
            $titulo = $dados->titulo;
            $edicao = $dados->edicao;
            $id_editora = $dados->editora;
            $id_autor = $dados->autor;
            $id_categoria = $dados->categoria;
            $id_usuario = $dados->usuario;
            $id_personagens = $dados->personagens;
            $foto = $dados->foto;
            $foto = "imagens/imgs/" . $foto;
            $link = $dados->link;
            //essa sessao no download ele faz a contagem e manda na page iddown o id do movimento da hq
			if (isset($_SESSION['logado']) && ($_SESSION['logado'] == true)){
				echo "<div class='col-lg-3'>
						<div class='img-circle'>
							<img src='$foto' alt='$titulo' width='180' height='180' style='padding:0px';>
							<div class='item-overlay top'></div>
						</div>
						<h2>$titulo</h2>
						<p>$edicao</p>
						<p>$id_categoria</p>
						<p>$id_autor</p>

						
						<p>";
                            // Envia o idhq e o link para o arquivo de download para fazer a contagem e depois efetuar download 
						echo "<a href='./download.php?iddownload=".$id."&link=".$link."' class='btn btn-default btn-hq-preto' target=\"_blank\">Faça Download</a>
						</p>
					</div>"; 
			}else{
				echo "<div class='col-lg-3'>
						<div class='img-circle'>
							<img src='$foto' alt='$titulo' width='180' height='180' style='padding:0px';>
							<div class='item-overlay top'></div>
						</div>
						<h2>$titulo</h2>
						<p>$edicao</p>
						<p>$id_categoria</p>
						<p>$id_autor</p>

						<p style=\"font-size:12px;\">
							Registre-se para fazer o download.
						</p>
					</div>";			
				
			}		
		}
		?>
    </div>
</div>