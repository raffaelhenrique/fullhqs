<div class="container noticia-container">
    <div class="posts-home">
        <div class="centro-post">
            <h1>POST</h1>
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
        inner join usuario_sistema u on (p.id_usuario = u.id) 
        order by p.data desc";
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
               <div class='conteudo-item' id='post'>
                    <div class='item1'>
                        <img src='$foto' alt='$titulo' style='padding:0px;'>
                        <div class='item-overlay top'></div>
                    </div>
                    <div class='texto-post'>
                      
                        <h1 <p style=\"font-size: 2.2em;width: 100%;text-align: left;\">$titulo</h1>
                        <p>$resumo</p>
                        <span class='data-publicacao'>Data: $data</span>
                        <a href='?pg=postleitura&id=$id' class='btn btn-default btn-hq-preto'>Ver Noticia</a>
                    </div>
              </div>
              ";
            }
            ?>
        </div>
    </div>
</div>