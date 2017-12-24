<?php

//verificar se foi dado post
if ($_POST) {
//se foi - salvar/alterar
//recuperar os dados enviados
    $id = trim($_POST["id"]);
    $login = mb_strtolower(trim($_POST["login"]));
    $senha = password_hash(trim($_POST["senha"]), PASSWORD_DEFAULT);
    $email = trim($_POST["email"]);

//montar o sql para inserir ou atualizar
    if (empty($id)) {
//inserir
        $sql = "insert into usuario (id,login,senha,email) values (NULL, '$login','$senha','$email')";
    } else {
//atualizar
        $sql = " update usuario set 
                    login = '$login',
                    senha = '$senha',
                    email = '$email'   
                    where id = $id limit 1";
//executar
    }
    $consulta = $con->prepare($sql);
//passar os parametros
    $consulta->bindParam(1, $login);
    $consulta->bindParam(2, $senha);
    $consulta->bindParam(3, $email);

    if (!empty($id)) {
        $consulta->bindParam(4, $id);
    }
//verificar se executa , caso nao executar eliminar esse proximo if ate o final do preencha email e da '}'
    if (empty($login)) {
            echo "<script>alert('Preencha o campo login');history.go(-1);</script>";
        } else if (empty($senha)) {
            echo "<script>alert('Preencha a senha');history.go(-1);</script>";
        } 
         else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Preeencha com um e-mail válido');history.go(-1);</script>";
        } 

    if ($consulta->execute()) {
        //mensagem de sucesso
        echo "<h1 class='text-center' style='color:#36c335; margin-top: 0px;font-weight: 600;'>Seu Cadastro Foi Efetivado Com Sucesso , Seja Bem Vindo!</h1>";
    } else {
        //mensagem de erro
        echo "<h1 class='text-center' style='color:#650101; margin-top: 0px;font-weight: 600;'>Usuario Ja cadastrado tente novamente!</h1>";
    }
}
