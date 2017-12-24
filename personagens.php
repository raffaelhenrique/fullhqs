<?php
// recuperando os dados do id
$id = $_GET["id"];

require_once 'coleta.php';
//aqui ele vai coletar os dados da pagina atual do personagem
coletarDadosPagina($con, $_SERVER['REQUEST_URI'],0,$id);
?>

<div class="container">
    <div class="row">
        <h1>Personagens</h1><br>
        <?php
        $sql = "select * from personagens where id =   " . (int) $id. " limit 1";
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

            echo  "<div class='conteudo-item' >
                    <div class='item1' style='border:0;'>
                        <img src='$foto' alt='$nome' style='padding:0px;'>
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
    </div><!-- /.row -->
</div>
