<?php

session_start();
//print_r($_SESSION);
//$_SESSION["logado"]!=="sim" ||
/*}
else{
//caso contrário, a mensagem abaixo é exibida.
echo "Você está logado ".$_SESSION["logado"]." Obrigado!";*/
//recuperar a variavel pg que indica qual pagina ira abrir
$pg = "home";

//verificar se esta sendo enviado um pg por GET
if (isset($_GET["pg"])) {
    //trim - retirar espaços em branco
    $pg = trim($_GET["pg"]);
}

//incluir o arquivo do banco de dados
include "conecta.php";


 //if (!empty($_SESSION['login'])) {
   //    echo '<script>alert(\'Usuário logado: ' . $_SESSION['login'] . '\')</script>';

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
        <link rel="stylesheet" type="text/css" href="css/responsivo.css">
        <link rel="stylesheet" type="text/css" href="colorbox.css">
        <link rel="stylesheet" type="text/css" href="css/demo.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/pushy.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <!-- importando as fontes -->
    
    </head>
    <body class="">
        <header class="cabeçalho">
            <div class="container">
                <div class="logo">
                    <a href="index.php">
                        <img class="imglogo" src="imagens/logo.png">
                    </a>
                </div>
                <div style="width: 250px;margin: 0;float: left;position: relative;top: 65px;left: 46px;">
					<form name="buscador" method="post" action="index.php?pg=resultadobusca" novalidate>
					<input id="Buscar" name="buscar" type="text" class="form-control" placeholder="Buscar"/>
                    <button class="btn btn-default btn-hq-preto" action="login" type="submit" style="float:right;margin-top:-34px;margin-right:-43px;"><i class="glyphicon glyphicon-search"></i></button>
					</form>
				</div>

                    <div class="menu">
                        <!-- EFETUAR O LOGIN -->
						<?php 
                        //die('<pre>' . print_r($_SESSION['login'], true) . '</pre>');
							if (isset($_SESSION['logado']) && ($_SESSION['logado'] == true)){
								//se o usuario retornar verdadeiro , fazer o login com o nome de usuario com botao de sair.		
								echo '<div class="item-login" style="float:right;"><h1><i class="glyphicon glyphicon-user"></i> '.ucfirst($_SESSION['login']).' - <a style="color:#fff;" href="./logoff.php" /><i class="glyphicon glyphicon-off"></i> Sair</a></h1></div>';
								
							}else{
						?>
					
						
                        <form name="login" method="post" action="verificar.php" novalidate> 
                            <div class="efetuar-login">
                                <div class="item-login">
                                    <h1>Digite o Login</h1>
                                    <input type="text" required name="login" class="form-control" value data-validation-required-message="Preencha o nome" placeholder="Digite seu Login">
                                </div>
                                <div class="item-login">
                                    <h1>Digite a Senha</h1>
                                    <input type="password" required name="senha" action="verificar"  class="form-control" value data-validation-required-message="Preencha a senha" placeholder="Digite sua Senha">
                                </div>
                                <button class="btn btn-default btn-hq-preto" action="login" type="submit" style="margin-left: 13px;margin-top: -30px; margin-bottom: 27px;">Efetuar Login</button>
                            </div>
                        </form>
						<?php
							}
						?>
                        <!-- MENU -->
                        <ul>
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="#">HQS</a>
                                <ul>
                                    <?php
                                    $sql = "select * from editora order by nome";
                                    $consulta = $con->prepare($sql);
                                    // execute o sql
                                    $consulta->execute();
                                    while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                        // separa os dados
                                        $id = $dados->id;
                                        $nome = $dados->nome;
                                        echo "<li><a href='?pg=editora&id=$id'>$nome</a></li>";
                                    }
                                   
                                    ?>
                                </ul>
                            </li>
                            <li><a href="#">PERSONAGENS</a>
                                  <ul>
                                    <?php
                                    $sql = "select * from editora order by nome";
                                    $consulta = $con->prepare($sql);
                                    // execute o sql
                                    $consulta->execute();
                                    while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                        // separa os dados
                                        $id = $dados->id;
                                        $nome = $dados->nome;
                                        echo "<li><a href='?pg=editorapersonagens&id=$id'>$nome</a></li>";
                                    }
                                   
                                    ?>
                                </ul>
                                
                            </li>
                            <li><a href="?pg=post">POST</a></li>
                            <li><a href="?pg=autor">AUTOR</a></li>
                            <li><a href="#">GALERIA</a>
                             <ul>
                                    <?php
                                    $sql = "select * from editora order by nome";
                                    $consulta = $con->prepare($sql);
                                    // execute o sql
                                    $consulta->execute();
                                    while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                        // separa os dados
                                        $id = $dados->id;
                                        $nome = $dados->nome;
                                        echo "<li><a href='?pg=galeria&id=$id'>$nome</a></li>";
                                    }
                                    ?>
                                </ul></li>
                            <li><a href="?pg=noticia">NOTICIAS</a></li>
                            <li><a href="?pg=cadastro">CADASTRO</a></li>
                            <li><a href="?pg=contato">CONTATO</a></li>
                              <li><a href="#">RANKING</a>
                                  <ul>
                                    <?php
                                    echo "<li><a href='?pg=rankingpersonagens'>Personagens</a></li>";
                                    ?>
                                     <?php
                                    echo "<li><a href='?pg=rankinghqs'>HQS</a></li>";
                                    ?>

                                </ul>

                        </ul>
                    </div>
                </nav>
            </div>
            <!-- MENU RESPONSIVO -->
            <div class="group-responsive">
                <div class="container">
                    <div class="logo">
                        <a href="index.php">
                            <img class="imglogo" src="imagens/logo.png">
                        </a>
                    </div>
                    <div class="button-item">
                        <button class="menu-btn">&#9776; Menu</button>
                    </div>
                    <div class="buscador-responsivo">
                        <form name="buscador" method="post" action="index.php?pg=resultadobusca" novalidate>
                            <input id="Buscar" name="buscar" type="text" class="form-control" placeholder="Buscar"/>
                            <button class="btn btn-default btn-hq-preto" action="login" type="submit" style="float:right;margin-top:-34px;margin-right:-43px;"><i class="glyphicon glyphicon-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
             <!-- Pushy Menu -->
        <nav class="pushy pushy-left" data-focus="#first-link">
            <div class="pushy-content">
                <ul>
                    <li class="pushy-submenu">
                        <button id="first-link" href="index.php">Home</button>
                    </li>
                    <li class="pushy-submenu">
                        <button>HQS <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
                        <ul>
                            <?php
                            $sql = "select * from editora order by nome";
                            $consulta = $con->prepare($sql);
                            // execute o sql
                            $consulta->execute();
                            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                // separa os dados
                                $id = $dados->id;
                                $nome = $dados->nome;
                                echo "<li><a href='?pg=editora&id=$id'>$nome</a></li>";
                            }

                            ?>
                        </ul>
                    </li>
                    <li class="pushy-submenu">
                        <button>PERSONAGENS <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
                        <ul>
                            <?php
                            $sql = "select * from editora order by nome";
                            $consulta = $con->prepare($sql);
                            // execute o sql
                            $consulta->execute();
                            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                // separa os dados
                                $id = $dados->id;
                                $nome = $dados->nome;
                                echo "<li><a href='?pg=editorapersonagens&id=$id'>$nome</a></li>";
                            }

                            ?>
                        </ul>
                    </li>
                    <li class="pushy-link"><a href="?pg=post">POST</a></li>
                    <li class="pushy-link"><a href="?pg=autor">AUTOR</a></li>
                    <li class="pushy-link"><a href="?pg=noticia">NOTICIAS</a></li>
                    <li class="pushy-link"><a href="?pg=cadastro">CADASTRO</a></li>
                    <li class="pushy-link"><a href="?pg=contato">CONTATO</a></li>
                    <li class="pushy-submenu">
                        <button>RANKING <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
                        <ul>
                            <?php
                            echo "<li><a href='?pg=rankingpersonagens'>Personagens</a></li>";
                            ?>
                            <?php
                            echo "<li><a href='?pg=rankinghqs'>HQS</a></li>";
                            ?>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
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
            <p>
                Visite-nos nas redes 
                    sociais
            </p>

            <a href="//www.facebook.com" title="facebook">
            <img src="imagens/face.png" title="facebook">
            </a>

            <a href="//www.twuitter.com " title="twitter">
            <img src="imagens/tw.png " alt="Twitter" title="Twitter">
            </a>

            <a href="http://youtube.com" title="Youtube">
            <img src="imagens/youtube.png" alt="Youtube" title="Youtube">
            </a>
        </footer>




        <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="js/pushy.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
        <script>
            $(function () {
                $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            });
        </script>
    </body>
</html>