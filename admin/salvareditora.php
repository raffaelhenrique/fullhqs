<?php

if ($_POST) {
    //recuperar os dados enviados
    $id = trim($_POST["id"]);
    $editora = trim($_POST["editora"]);

    //verificar se a plataforma foi preenchida
    if (empty($editora)) {
        echo "<div class='alert alert-danger'>Preencha a editora</div>";
    } else {

        //se o id for vazio - insere
        if (empty($id)) {
            $sql = "insert into 
					editora (id, nome)
					values (NULL, ?)";
        } else {
            //se for atualizar
            $sql = "update editora
					set nome = ? where id = ?
					limit 1";
        }
        $consulta = $con->prepare($sql);
        $consulta->bindParam(1, $editora);
        if (!empty($id)) {
            $consulta->bindParam(2, $editora);
        }
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
} else {
    //mensagem de erro
    echo "<div class='alert alert-danger'>
		Erro ao acessar arquivo!</div>";
}
        