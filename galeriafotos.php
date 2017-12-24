<?php
// recuperando os dados do id
$id = $_GET["id"];

$sql = "select * from personagens where id = " . (int) $id . " limit 1";
$consulta = $con->prepare($sql);
$consulta->execute();
?>

<div class="container">
    <div class="row">
        <h1>Fotos</h1>
        <?php
		
		
        $sql = "select * from galeria where id_personagens = " . (int) $id;
        //$sql = "select * from personagens where id = ".(int)$id;
        $consulta = $con->prepare($sql);
        $consulta->execute();

        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
            $id = $dados->id;
            $id_personagens = $dados->id_personagens;
            $nome = $dados->nome;
            $foto = $dados->foto;
            $foto = "imagens/imgs/" . $foto;
            $link = $dados->link;

			if (isset($_SESSION['logado']) && ($_SESSION['logado'] == true)){
				echo "<div class='col-lg-3'>
						<div class='img-circle'>
							<img src='$foto' alt='$nome' width='180' height='180' style='padding:0px';>
							<div class='item-overlay top'></div>
						</div>
						<h2>$nome</h2>
						
						<p>
							<a href='$link' class='btn btn-default btn-hq-preto'>Download Wallpapers</a>
						</p>
					</div>"; 
			}else{
				echo "<div class='col-lg-3'>
						<div class='img-circle'>
							<img src='$foto' alt='$nome' width='180' height='180' style='padding:0px';>
							<div class='item-overlay top'></div>
						</div>
						<h2>$nome</h2>
						
						<p style=\"font-size:16px;\">
							Registre-se para fazer o download.
						</p>
					</div>";			
				
			}		
		}
		?>
    </div>
</div>