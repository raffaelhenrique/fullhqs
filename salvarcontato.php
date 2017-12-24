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
        $para = "eduardorocha460@gmail.com";
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

    if ($consulta->execute()) {
        echo "<div class='fundo-rodape'>
                    <div class='container salvarcontato'>
                    <h1 class='text-center' style='color:#ffffff; margin-top: 40px;'>Suas Informações de Contato Foi Enviada Com Sucesso</h1>
                    <h3 class='text-center' style='color:#ffffff;'>Aguade o Retorno da Nossa Equipe !!!</h3>
                        <div class='alert alert-success'>Registro Salvo/Alterado com sucesso!</div>
                    </div>
        </div>";
    } else {
        echo "<div class='fundo-rodape'>
                <div class='container'>
                <h1 class='text-center' style='color:#610000; margin-top: 40px;'>Ocorreu Algum Erro no Envio do Formulario !!!</h1>
                <h3 class='text-center' style='color:#ffffff;'>Tente Novamente</h3>
                     <div class='alert alert-block alert-danger'>Erro ao Salvar/Alterar</div>
                </div>
        </div>";
    }
} else {
    //se não foi - erro
    echo "<div class='fundo-rodape'>
                <div class='container'>
                <h1 class='text-center' style='color:#610000; margin-top: 40px;'>Erro Ao Enviar o Formulario</h1>
                <h3 class='text-center' style='color:#ffffff;'>Tente Novamente</h3>
                     <div class='alert alert-block alert-danger'>Erro ao acessar página</div>
                </div>
        </div>";
}