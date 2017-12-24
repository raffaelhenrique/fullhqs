<?php

require_once 'conecta.php';
//o coleta eu insiro no banco , ligada com o relatorio , no relatorio to listando.
//dessa tabela , ela vai para a tabela de downloads e para a de ranking para fazer as contagens.
// o =0 e um valor padrao.
function coletarDadosPagina(&$con = null,$url='',$idhq=0, $idpersonagem=0, $iddownload=0){
	
	$sql = "insert into paginasmovimento (url, idhq, idpersonagem, iddownload) values (:url,:idhq,:idpersonagem,:iddownload);";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':url', $url);
	$stmt->bindParam(':idhq', $idhq);
	$stmt->bindParam(':idpersonagem', $idpersonagem);
	$stmt->bindParam(':iddownload', $iddownload);
	$stmt->execute();
//	echo $sql;
//
	
}