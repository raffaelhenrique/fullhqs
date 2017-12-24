<?php
	
	if ($_POST) {
		//recuperar os dados enviados
		$id = trim($_POST["id"]);
		$nome = trim($_POST["nome"]);
		$descricao = trim($_POST["descricao"]);



		if ( isset( $_FILES[ 'foto' ][ 'name' ] ) && $_FILES[ 'foto' ][ 'error' ] == 0 ) {

    /*echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'foto' ][ 'name' ] . '</strong><br />';
    echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'foto' ][ 'type' ] . ' </strong ><br />';
    echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'foto' ][ 'tmp_name' ] . '</strong><br />';
    echo 'Seu tamanho é: <strong>' . $_FILES[ 'foto' ][ 'size' ] . '</strong> Bytes<br /><br />';*/
 
    $arquivo_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
    $nome1 = $_FILES[ 'foto' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nome1, PATHINFO_EXTENSION );
 
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
        $destino = '../imagens/imgs/' . $novoNome;
 
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

		//verificar se a plataforma foi preenchido

			//se o id for vazio - insere
			if (empty($id)) {
				$sql = "insert into 
					autor (id, nome, descricao, foto)
					values (NULL, ?, ?, ?)";
			} else {
				//se for atualizar
				$sql = "update autor
					set nome = ?,
					descricao= ?,
					foto = ?
					where id = ? limit 1";
			}
			$consulta = $con->prepare($sql);
			$consulta->bindParam(1,$nome);
			$consulta->bindParam(2,$descricao);
			$consulta->bindParam(3,$novoNome);
                        if (!empty($id)){ $consulta->bindParam(4,$id);}
			//verificar se executou
			if ($consulta->execute()) {
				//mensagem de sucesso
				echo "<div class='alert alert-success'>Registro salvo com sucesso!</div>";
			} else {
				//mensagem de erro
				echo "<div class='alert alert-danger'>Erro ao Salvar.
				</div>";
			}

		}


	 else {
		//mensagem de erro
		echo "<div class='alert alert-danger'>
		Erro ao acessar arquivo!</div>";
	}