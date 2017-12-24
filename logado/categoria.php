<?php
// recuperando os dados do id
$id = $_GET["id"];

$sql = "select * from categoria where id = " . (int) $id . " limit 1";
$consulta = $con->prepare($sql);
$consulta->execute();
?>

<div class="container">
    <div class="row">
        <h1>Personagens</h1><br>
        <?php
        $sql = "select * from personagens where id_categoria = " . (int) $id;
        //$sql = "select * from personagens where id = ".(int)$id;
        $consulta = $con->prepare($sql);
        $consulta->execute();

        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            $id = $dados->id;
            $id_categoria = $dados->id_categoria;
            $nome = $dados->nome;
            $descricao = $dados->descricao;
            $foto = $dados->foto;
            $foto = "imagens/imgs/" . $foto;

            echo "<div class='col-lg-3'>
                <img class='img-circle' src='$foto' alt='$descricao' width='140' height='140'>
                    <h2>$nome</h2>
                    <p>$descricao</p>
                    <p><a class='btn btn-default btn-hq-preto' href='?pg=hqs&id=$id' role='button'>Veja Mais</a></p>
                 </div>  
            

            ";
        }
        ?>
    </div><!-- /.row -->
</div>