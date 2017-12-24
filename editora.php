<?php
// recuperando os dados do id
$id = $_GET["id"];

$sql = "select * from editora where id = " . (int) $id . " limit 1";
$consulta = $con->prepare($sql);
$consulta->execute();
?>

<div class="container">
    <div class="row">
        <h1>Personagens</h1><br>
        <?php
        $sql = "select * from personagens where id_editora = " . (int) $id . " order by nome";
        //$sql = "select * from personagens where id = ".(int)$id;
        $consulta = $con->prepare($sql);
        $consulta->execute();

        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            $id = $dados->id;
            $id_editora = $dados->id_editora;
            $nome = $dados->nome;
            $descricao = $dados->descricao;
            $foto = $dados->foto;
            $foto = "imagens/imgs/" . $foto;
            //$foto = $foto . ".jpg";

            echo "<div class='col-lg-3'>
                <img class='img-circle' src='$foto' alt='$descricao' width='140' height='140'>
                    <h2>$nome</h2>
                    
                    <p><a class='btn btn-default btn-hq-preto' href='?pg=hqs&id=$id' role='button'>Clique para ver Mais</a></p>
                 </div>  
            

            ";
        }
        ?>
    </div><!-- /.row -->
</div>