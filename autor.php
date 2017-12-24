<?php
// recuperando os dados do id
//$id = $_GET["id"];


$sql = "select * from autor ";
$consulta = $con->prepare($sql);
$consulta->execute();
?>

<div class="container">
    <div class="row">
        <h1>AUTOR</h1><br>
        <?php
        $sql = "select * from autor ";
        //$sql = "select * from Autor where id = ".(int)$id;
        $consulta = $con->prepare($sql);
        $consulta->execute();

        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            $id = $dados->id;
            $nome = $dados->nome;
            $descricao = $dados->descricao;
            $foto = $dados->foto;
            $foto = "imagens/imgs/" . $foto;
            //$foto = $foto . ".jpg";

            echo "<div class='col-lg-3'>
                <img class='img-circle' src='$foto' alt='$$nome' width='200' height='200'>
                    <h1>$nome</h1>
                    
                     <a href='?pg=autorleitura&id=$id' class='btn btn-default btn-hq-preto'>Ver Noticia</a>
                  </div> ";
                         
        }

        ?>
    </div><!-- /.row -->
</div>