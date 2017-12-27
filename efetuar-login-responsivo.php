<form name="login" method="post" action="verificar.php" novalidate> 
                            <div class="efetuar-login">
                                <h1 class="text-center">Efetuar Login</h1>
                                <div class="item-login">
                                    <h1>Digite o Login</h1>
                                    <input type="text" required name="login" class="form-control" value data-validation-required-message="Preencha o nome" placeholder="Digite seu Login">
                                </div>
                                <div class="item-login">
                                    <h1>Digite a Senha</h1>
                                    <input type="password" required name="senha" action="verificar"  class="form-control" value data-validation-required-message="Preencha a senha" placeholder="Digite sua Senha">
                                </div>
                                <button class="btn btn-default btn-hq-preto" action="login" type="submit" style="margin-left: 13px;margin-top: -30px; margin-bottom: 27px;">Efetuar Login</button>
                            </div>
                        </form>