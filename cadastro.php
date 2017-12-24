<div class="container">
    <h1 style="color: #fff; text-align: center;">Cadastro de Usuarios</h1>
    <div class="clearfix"></div>

    <?php
    //edição dos dados
    $id = $login = $senha = $email = "";
    //verifica se foi enviado id por get
    if (isset($_GET["id"])) {
        $id = trim($_GET["id"]);
        //sql para selecionar o usuarios
        //$sql = "select * from usuario where id = ? limit 1";
        $consulta = $con->prepare($sql);
        $consulta->bindParam(1, $id);
        $consulta->execute();
        $dados = $consulta->fetch(PDO::FETCH_OBJ);
        //separar os dados
        $id = $dados->id;
        $login = $dados->login;
        $senha = $dados->senha;
        $email = $dados->email;
    }
    ?>
    <div class="row">
        <form name="form1" method="post" novalidate action="index.php?pg=salvarcadastro" >
            <fieldset style='border:0;'>
                <legend style="color: #fff;">Campo obrigatório</legend>

                <div class="col-md-7">
                    <input type="hidden" name="id"
                           class="form-control" readonly
                           value="<?= $id; ?>">

                    <div class="control-group">
                        <label for="login" class="control-label" style="color: #fff;font-size: 2.8em;">Login:</label>
                        <div class="controls">
                            <input type="text" required id="login"
                                   name="login" class="form-control"
                                   data-validation-required-message="Preencha o nome do usuario"
                                   value="<?= $login; ?>" placeholder="Preencha o Login Ex: joao">
                        </div>

                    </div>

                    <br>
                    <div class="control-group">
                        <label for="senha" class="control-label" style="color: #fff;font-size: 2.8em;">senha:</label>
                        <div class="controls">
                            <input type="password" required
                                   name="senha"
                                   class="form-control"
                                   data-validation-required-message="Preencha a senha"
                                   value="<?= $senha; ?>" placeholder="Preencha uma senha">
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <label for="email" class="control-label" style="color: #fff;font-size: 2.8em;">Email:</label>
                        <div class="controls">
                            <input type="email" required id="email"
                                   name="email" class="form-control"
                                   data-validation-required-message="Preencha o email"
                                   placeholder="Digite um email valido"
                                   value="<?= $email; ?>">
                        </div>

                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Gravar/Atualizar</button>
                </div>
                <div class="col-md-5">
                    <div class="item1">
                        <img src="imagens/enquadrao.jpg" alt="esquadrao" style="padding:0px;  max-width: 180%;">
                        <div class="item-overlay top"></div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>