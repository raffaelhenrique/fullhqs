<?php
// recuperando os dados do id

  $id = $_GET["id"];

  $sql = "select * from post where id = " . (int) $id . " limit 1";
  $consulta = $con->prepare($sql);
  $consulta->execute(); 
?>

<div class="container noticia-container">
    <div class="post-home">
        <div class="centro-post">
            <h1>Post</h1>
            <?php
            //carregar as noticias

            $sql = "select
		p.id,
		u.nome usuario,
		p.titulo titulo,
		p.resumo resumo,
		p.noticia noticia,
		date_format(p.data,'%d/%m/%Y') data,
        p.foto foto
		from post p
		inner join usuario_sistema u on (p.id_usuario = u.id) where p.id = " . (int) $id . " limit 1";
            $consulta = $con->prepare($sql);
            $consulta->execute();
            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {

                $id = $dados->id;
               
                $id_usuario = $dados->usuario;
                $titulo = $dados->titulo;
                $resumo = $dados->resumo;
                $noticia = $dados->noticia;
                $data = $dados->data;
                $foto = $dados->foto;
                //lugar de onde esta a foto
                $foto = "imagens/imgs/" . $foto;
                //mostrar a foto na tela
                echo "
               <div class='conteudo-item'>
                    <div class='item1'>
                        <img src='$foto' alt='$titulo' style='padding:0px;'>
                        <div class='item-overlay top'></div>
                    </div>
                    <div class='texto-post'>
                        <span class='data-publicacao' style='float: right; margin-top: 20px;font-size: 2.9em;'>Cadastro realizado por: $id_usuario</span>
                        <h1 style='font-size: 3.0em;width:100%;'>$titulo</h1>
                        <p>$noticia</p>
                        <span class='data-publicacao'  style='font-size: 1.9em;'>Data: $data</span>
                    </div>
              </div>
              ";
            }
            ?>
        </div>
    </div>
</div>
