<?php
	//iniciar a sessao
	session_start();
	//verificar se existe um $_SESSION["login"]
	if (!isset($_SESSION["login"])) {
		//tela de login
		header("Location:index.php");
	}

	include "conecta.php";

	