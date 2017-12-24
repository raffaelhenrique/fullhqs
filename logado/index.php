<?php
//recuperar a variavel pg que indica qual pagina ira abrir
$pg = "home";

//verificar se esta sendo enviado um pg por GET
if (isset($_GET["pg"])) {
    //trim - retirar espaços em branco
    $pg = trim($_GET["pg"]);
}

//incluir o arquivo do banco de dados
include "conecta.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fullqhs - Oficial</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> <!-- BOOTSTRAP-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!-- BOOTSTRAP-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"> <!-- BOOTSTRAP-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"> <!-- BOOTSTRAP-->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="colorbox.css">
        <!-- importando as fontes -->
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
        <script>
            $(function () {
                $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            });
        </script>
    </head>
    <body>
        <header class="cabeçalho">
            <div class="container">
                <div class="logo">
                    <a href="index.php">
                        <img class="imglogo" src="imagens/logo.png">
                    </a>
                </div>

                <nav class="nav-padrao">
                    <div class="menu">
                        <!-- EFETUAR O LOGIN -->
                        <form name="login" method="post" action="verificar.php" novalidate> 
                            <div class="efetuar-login">
                                <div class="item-login">
                                    <h1>Digite o Login</h1>
                                    <input type="text" required name="nome" class="form-control" value data-validation-required-message="Preencha o nome" placeholder="Digite seu Login">
                                </div>
                                <div class="item-login">
                                    <h1>Digite a Senha</h1>
                                    <input type="text" required name="nome" class="form-control" value data-validation-required-message="Preencha a senha" placeholder="Digite sua Senha">
                                </div>
                                <a href="#" class="btn btn-default btn-hq-preto">Efetuar Login</a>
                            </div>
                        </form>
                        <!-- MENU -->
                        <ul>
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="#">HQS</a>
                                <ul>
                                    <?php
                                    $sql = "select * from categoria order by nome";
                                    $consulta = $con->prepare($sql);
                                    // execute o sql
                                    $consulta->execute();
                                    while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                        // separa os dados
                                        $id = $dados->id;
                                        $nome = $dados->nome;
                                        echo "<li><a href='?pg=categoria&id=$id'>$nome</a></li>";
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="?pg=personagens">PERSONAGENS</a></li>
                            <li><a href="#">GALERIA</a></li>
                            <li><a href="#">NOTICIAS</a></li>
                            <li><a href="#">CONTATO</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <section>
            <?php
            //configurar a página - home -> home.php
            $pg = $pg . ".php";
            //verificar se o arquivo existe
            if (file_exists($pg)) {
                //se existir incluir o arquivo
                include $pg;
            } else {
                //incluir o arquivo de erro
                include "erro.php";
            }
            ?>
        </section>
        <footer>

        </footer>
    </body>
</html>