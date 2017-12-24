<?php
// recuperando os dados do id

 $id = $_GET["id"];


  $sql = "select * from autor where id = " . (int) $id . " limit 1";
  
  $consulta = $con->prepare($sql);
  $consulta->execute(); 
?>

<div class="container autor-container">
    <div class="post-home">
        <div class="centro-post">
            <h1>AUTOR</h1>
            <?php
            //carregar as noticias

            $sql = "select * from autor  where id = " . (int) $id . " limit 1";
            $consulta = $con->prepare($sql);
            $consulta->execute();
            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {

                $id = $dados->id;
                $nome = $dados->nome;
                $descricao = $dados->descricao;
                $foto = $dados->foto;
                //lugar de onde esta a foto
                $foto = "imagens/imgs/" . $foto;
                //mostrar a foto na tela
                 echo  "<div class='conteudo-item'>
                    <div class='item1' style='border:0;'>
                        <img src='$foto' alt='$nome' width='700' height='500' style='padding:0px;'>
                        <div class='item-overlay top'></div>
                    </div>
                    <div class='texto-post' style='border:0;'>
                        <h1>$nome</h1>
                        <p>$descricao</p>
                    </div>
              </div>
              ";
            }
            ?>
        </div>
    </div>
</div>
