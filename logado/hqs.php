<?php
// recuperando os dados do id
$id = $_GET["id"];

$sql = "select * from personagens where id = " . (int) $id . " limit 1";
$consulta = $con->prepare($sql);
$consulta->execute();
?>

<div class="container">
    <div class="row">
        <h1>HQS</h1>
        <?php
        $sql = "select * from hqs where id_personagens = " . (int) $id;
        //$sql = "select * from personagens where id = ".(int)$id;
        $consulta = $con->prepare($sql);
        $consulta->execute();

        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            $id = $dados->id;
            $titulo = $dados->titulo;
            $edicao = $dados->edicao;
            $id_editora = $dados->id_editora;
            $id_autor = $dados->id_autor;
            $id_categoria = $dados->id_categoria;
            $id_usuario = $dados->id_usuario;
            $id_personagens = $dados->id_personagens;
            $foto = $dados->foto;
            $foto = "imagens/imgs/" . $foto;

            echo "<div class='col-lg-3'>
                    <div class='item1'>
                        <img src='$foto' alt='superman x homem Aranha'>
                        <div class='item-overlay top'></div>
                    </div>
                    <h2>$titulo</h2>
                    <p>$edicao</p>
                    <p>
                        <a href='#' class='btn btn-default btn-hq-preto'>Ver Mais</a>
                    </p>"; }?>
    </div>
</div>