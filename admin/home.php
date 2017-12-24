<?php
	include "login.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema Conexão</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" 
	href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" 
	href="css/style.css">

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-inputmask.min.js"></script>
	<script type="text/javascript" src="js/jqBootstrapValidation.js"></script>

	<script>
  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
	</script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">Sistema</a>
    </div>

    <div class="collapse navbar-collapse 
    navbar-right" id="menu">
      <ul class="nav navbar-nav">
        
        
          
          
          <li>
          <a href="home.php?pg=hqs">
            Hqs
          </a>
        </li> 
         <li>
          <a href="home.php?pg=personagens">
            Personagens
          </a>
        </li> 
        <li>
          <a href="home.php?pg=editora">
            Editora
          </a>
        </li> 
        <li>
          <a href="home.php?pg=usuario">
           Usuario
          </a>
        </li> 
        <li>
          <a href="home.php?pg=autor">
            Autor
          </a>
        </li> 
        
        <li>
        	<a href="home.php?pg=categoria">
        		Categoria
        	</a>
        </li>
        <li>
        	<a href="home.php?pg=noticia">
        		Noticia
        	</a>
        </li>
         <li>
          <a href="home.php?pg=post">
          Post
          </a>
        </li>
        <li>
          <a href="home.php?pg=galeria">
          Galeria
          </a>
        </li>
        
         <li>
          <a href="home.php?pg=banner">
          Banner
          </a>
        </li>
           <li>
          <a href="home.php?pg=usuariosistema">
          Usuario Sistema
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Relatórios
          	<span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
            	<a href="home.php?pg=relatoriohqs">HQS</a>
            </li>
            <li>
            	<a href="home.php?pg=relatoriopersonagens">Personagens</a>
            </li>
            
      	  </ul>
      	 </li>		
        <li>
          <a href="home.php?pg=contato">
          Contatos
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
          	Olá <?php echo $_SESSION["login"];?>
          	<span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
            	<a href="home.php?pg=senha">Senha</a>
            </li>
            <li>
              <a href="sair.php">
              <i class="glyphicon glyphicon-off"></i> Sair</a>
            </li>
      	  </ul>
      	 </li>
      	</ul>
     </div>
    </div>
   </nav>

   <div class="well container">
   <?php
   	//verificar a variavel pg
   	if (isset($_GET["pg"]))
   		$pg = trim($_GET["pg"]);
   	else
   		$pg = "inicio";

   	//incluir o .php no nome do arquivo
   	$pg = $pg . ".php";
   	//plataforma -> plataforma.php
   	//verificar se o arquivo existe
   	if (file_exists($pg)) 
   		include $pg;
   	else
   		include "erro.php";

   ?>
   </div>

</body>
</html>