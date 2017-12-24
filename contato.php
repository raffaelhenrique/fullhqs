<div class="container">
    <h1 style="color: #fff; text-align: center;">Entre em Contato</h1>
    <div class="clearfix"></div>
       <?php
    //edição dos dados
    $id = $nome = $email = $mensagem = "";
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
        $nome = $dados->nome;
        $email = $dados->email;
        $mensagem = $dados->mensagem;
    }
    ?>

    <div class="row">
        <form name="form1" method="post" novalidate action="?pg=enviar" >
            <fieldset style='border:0;'>
                <legend style="color: #fff;">Campo obrigatório</legend>
                <input type="hidden" name="id"
                    class="form-control" readonly
                     value="<?=$id;?>">


                <div class="col-md-7">
                    
                    <div class="control-group">
						<label for="nome" class="control-label" style="color: #fff;font-size: 2.8em;">Nome:</label>
                        <div class="controls">
						<input type="text" name="nome" class="form-control" placeholder="Digite seu nome completo" required class="form-control" value="<?=$nome;?>">
                        </div>

                    </div>

                    <br>
                    <div class="control-group">
						<label for="email" class="control-label" style="color: #fff;font-size: 2.8em;">E-mail:</label>						
                        <div class="controls">
							<input type="email" name="email" class="form-control" placeholder="Preencha com um e-mail válido" required value="<?=$email;?>" >								   
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
						<label for="mensagem" class="control-label" style="color: #fff;font-size: 2.8em;">Mensagem:</label>
                        <div class="controls">
                            <textarea name="mensagem" cols="40" rows="5" class="form-control" required placeholder="Digite sua mensagem" value="<?=$mensagem;?>"></textarea>
                        </div>

                    </div>
                    <br>
					<button type="submit" class="btn btn-success">Enviar</button>					
                </div>
            </fieldset>
        </form>
    </div>
</div>
