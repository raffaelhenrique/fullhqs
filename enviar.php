<?php

//verificar se foi dado post
if ($_POST) {
    //se foi - salvar/alterar
    //recuperar os dados enviados
    $id = trim($_POST["id"]);
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
   
    $mensagem = trim($_POST["mensagem"]);

    /* ENVIANDO FORMULARIO PARA O EMAIL */
    /*
    if (empty($nome)) {
        echo "<p>Preencha o campo nome</p>";
    } else if (empty($email)) {
        echo "<p>Preencha o e-mail</p>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Preeencha com um e-mail válido</p>";
    } else if (empty($mensagem)) {
        echo "<p>Preencha sua mensagem</p>";
    } else {

        //mandar um e-mail
        //destinatario
        $para = "slipz.380.rh@gmail.com";
        $assunto = $assunto;
        $mensagem = $mensagem;
        //enviar o e-mail
        if (mail($para, $assunto, $mensagem, "From:$email")) {
            echo "<p>Mensagem enviada</p>";
        } else {
            echo "<p>Erro ao enviar</p>";
        }
    }
    */
    /* ENVIANDO FORMULARIO PARA O EMAIL */



    //montar o sql para inserir ou atualizar
    if (empty($id)) {
        //inserir
        $sql = "insert into contato (id,nome,email,mensagem) values (NULL, '$nome','$email','$mensagem')";
    } else {
        //atualizar
        $sql = " update contato set 
                    nome = '$nome',
                    email = '$email',
                    mensagem = '$mensagem'      
                    where id = $id limit 1";
        //executar
    }
    $consulta = $con->prepare($sql);
    //passar os parametros
    $consulta->bindParam(1, $nome);
    $consulta->bindParam(2, $email);
    $consulta->bindParam(3, $mensagem);



    if (!empty($id))
        $consulta->bindParam(4, $id);
    //verificar se executa

    if (empty($nome)) {
			echo "<script>alert('Preencha o campo nome.');history.go(-1);</script>";
		} else if (empty($email)) {
			echo "<script>alert('Preencha o e-mail');history.go(-1);</script>";
		} else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			echo "<script>alert('Preeencha com um e-mail válido');history.go(-1);</script>";
		} else if (empty($mensagem)) {
			echo "<script>alert('Preencha sua mensagem');history.go(-1);</script>";
		}

		else if ($consulta->execute()) {
        echo "<div class='fundo-rodape'>
                    <div class='container salvarcontato'>
                    <h1 class='text-center' style='color:#36c335; margin-top: 0px;font-weight: 600;'>Suas Informações de Contato Foram Enviadas Com Sucesso!!!</h1>
                   
                        
                    </div>
        </div>";
    } else {
        echo "<div class='fundo-rodape'>
                <div class='container'>
                <h1 class='text-center' style='color:#650101; margin-top: 0px;font-weight: 600;'>Ocorreu Algum Erro no Envio do Formulario !!!</h1>
                <h3 class='text-center' style='color:#650101;'>Tente Novamente</h3>
                     
                </div>
        </div>";
    }
} else {
    //se não foi - erro
    echo "<div class='fundo-rodape'>
                <div class='container'>
                <h1 class='text-center' style='color:#650101; margin-top: 0px; font-weight: 600;'>Erro Ao Enviar o Formulario</h1>
                <h3 class='text-center' style='color:#650101;'>Tente Novamente</h3>
                     
                </div>
        </div>";
}