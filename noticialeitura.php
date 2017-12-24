<?php
// recuperando os dados do id

  $id = $_GET["id"];

  $sql = "select * from noticia where id = " . (int) $id . " limit 1";
  $consulta = $con->prepare($sql);
  $consulta->execute(); 
?>

<div class="container noticia-container">
    <div class="post-home">
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
		inner join usuario_sistema u on (n.id_usuario = u.id) where n.id = " . (int) $id . " limit 1";
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
                        <h1 style='width:100%;font-size: 4.0em;'>$titulo</h1>
                        <p>$noticia</p>
                        <span class='data-publicacao' style='font-size: 1.8em;'>Data: $data</span>
                    </div>
              </div>
              ";
            }
            ?>
        </div>
    </div>
</div>
