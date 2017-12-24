<?php

    $limitedoresumo = 300 // 300 caracteres

?>


<div class="container noticia-container">
    <div class="posts-home">
        <div class="centro-post">
            <h1>Noticias</h1>
            <?php
            //carregar as noticias

            $sql = "select
		n.id,
		u.nome usuario,
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
                        
                        <h1>$titulo</h1>
                        <p>".substr($resumo,0,$limitedoresumo)."...</p>
                        <span class='data-publicacao'>Data: $data</span>
                        <a href='?pg=noticialeitura&id=$id' class='btn btn-default btn-hq-preto'>Ver Noticia</a>
                    </div>
              </div>
              ";
            }
            ?>
        </div>
    </div>
</div>