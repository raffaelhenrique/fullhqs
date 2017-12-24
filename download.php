<?php

//vai verifificar se veio a id de download 
if (isset($_GET['iddownload'])){
	require_once 'coleta.php';
	// a func con = conexao , o server pega a url atual . obs : olhar no coleta , cabecalho. 1 zero idq 2 person e 3..
	coletarDadosPagina($con, $_GET["link"],0,0,$_GET['iddownload']);
	//$arquivo = $_GET['arq'];

   //if(isset($arquivo) && file_exists($arquivo)){ // faz o teste se a variavel não esta vazia e se o arquivo realmente existe
	echo "<script>window.open('".$_GET["link"]."','_self');</script>";
	// o self serve pra abri na mesma janela.
  // }
} else {
  echo "download nao encontrado";


}
