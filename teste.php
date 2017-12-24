<?php
/*
function coletar($nome='Sala'){
	echo $nome;
}



coletar();
echo '<hr>';
coletar("Marcos");
echo '<hr>';
coletar("Marcos 123");
*/

/*
echo '<pre>';
print_r($_SERVER['REQUEST_URI']);
// Busca a URL que esta sendo acessada
*/
echo '<pre>';

require_once 'coleta.php';

$sqlHqs = "select hqs.*, personagens.foto as pfoto from hqs join personagens on personagens.id = hqs.id_personagens where hqs.titulo like '%lanterna%' or personagens.nome like '%lanterna%'  ";

		$consultaHqs = $con->prepare($sqlHqs);
		$consultaHqs->execute();

		$dadosHqs = $consultaHqs->fetchAll(PDO::FETCH_ASSOC);
		print_r($dadosHqs);
		
		die();

$personagensDB = array('Lanterna','H Aranha','M Maravilha','Iron Man');
//$personagensDB = array('nome'=>'Raffael','idade'=>25, 'Sexo'=>'M');
print_r($personagensDB);
echo '<hr>';

foreach($personagensDB as $indice => $valor){
	echo $indice.' - '.$valor.'<br />';
}