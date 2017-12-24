<?php
	//verificar se foi dado post
	if ($_POST) {
		//se foi - salvar/alterar

		//recuperar os dados enviados
		$id = trim($_POST["id"]);
		$titulo = trim($_POST["titulo"]);
		$texto = trim($_POST["texto"]);
		
		
		
/******
 * Upload de imagens
 ******/


 
// verifica se foi enviado um arquivo
if ( isset( $_FILES[ 'foto' ][ 'name' ] ) && $_FILES[ 'foto' ][ 'error' ] == 0 ) {

    /*echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'foto' ][ 'name' ] . '</strong><br />';
    echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'foto' ][ 'type' ] . ' </strong ><br />';
    echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'foto' ][ 'tmp_name' ] . '</strong><br />';
    echo 'Seu tamanho é: <strong>' . $_FILES[ 'foto' ][ 'size' ] . '</strong> Bytes<br /><br />';*/
 
    $arquivo_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
    $nomey = $_FILES[ 'foto' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nomey, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid ( time () ) . ".".$extensao;
 
        // Concatena a pasta com o nome
          $destino = "../imagens/imgs/" . $novoNome;
 
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            //echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
            //echo ' < img src = "' . $destino . '" />';
        }
        else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
    echo 'Você não enviou nenhum arquivo!';
		

		
		/*if (!empty($_FILES["foto"]["name"])) {
			//verificar se esta enviando um JPG
			$tipo = $_FILES["foto"]["type"];
			$arquivo = $_FILES["foto"]["name"];
			$tmp = $_FILES["foto"]["tmp_name"];
			$pasta = "../images/";

			$destino = $pasta . $arquivo;

			if ($tipo != "image/jpg") {
				echo "<div class='alert alert-danger'>Selecione um arquivo JPG, tipo do arquivo: $tipo</div>";
			} // else do tipo 
			else if (copy($tmp,$destino)) {

				//incluir a funcao
				include "imagem.php";
				//criar um novo nome
				$novo = time("");

				LoadImg($destino,
					$novo,
					$pasta);

			} else {
				echo "<div class='alert 
					alert-danger'>
					Erro ao copiar arquivo 
					$arquivo</div>";
			}
		} // if do $_FILES

		//verificar se esta preenchido
		if (!isset($novo)) $novo = "";*/

		//montar o sql para inserir ou atualizar
		if (empty($id)) {
			//inserir
			$sql = "insert into banner (id, titulo, texto, foto) 
			values (NULL, 
			?,
			?,
			?)";
		} else {
			//atualizar
			$sql = "update banner set 
			titulo= ?,
			texto = ?, 
			foto = ?
			where id = ? limit 1";
		}
		echo $sql;

		//executar
		$consulta = $con->prepare($sql);
		
		
		//passar os parametros
		$consulta->bindParam(1,$titulo);
		$consulta->bindParam(2,$texto);
		$consulta->bindParam(3,$novoNome);
		
		if (!empty($id))
			$consulta->bindParam(4,$id);
		//verificar se executa*/
                
	
		if ($consulta->execute()) {
			echo "<div class='alert alert-success'>Registro Salvo/Alterado com sucesso!</div>";
		} else {
			die('<pre>' . print_r($consulta->errorInfo(), true) . '</pre>');
			//die('<pre>' . print_r(, true) . '</pre>');
			//die('<pre>' . print_r($consulta->errorInfo(), true) . '</pre>');
			echo "<div class='alert alert-danger'>Erro ao Salvar/Alterar</div>";
                        
		}

	} else {
		//se não foi - erro
		echo "<div class='alert alert-danger'>
		Erro ao acessar página</div>";
	}