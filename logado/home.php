<div class="container">
    <div class="cycle-slideshow" id="banner" data-cycle-slides="> a">
        <div class="cycle-slideshow" id="banner" data-cycle-slides="> a">
            <?php
            //carregar os banners
            $sql = "select * from banner";
            $consulta = $con->prepare($sql);
            $consulta->execute();
            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {

                $id = $dados->id;
                $titulo = $dados->titulo;
                $texto = $dados->texto;
                $foto = $dados->foto;
                //lugar de onde esta a foto
                $foto = "imagens/$foto";
                $foto = $foto . ".jpg";
                //mostrar a foto na tela
                echo "<a href='#' title='$titulo'><img src='$foto' title='$titulo' class='img'></a>";
            }
            ?>
        </div>
        <main>
            <div class="container">
                <!-- INICIO DO ASIDE -->
                <div class="centro-aside">
                    <h1>Noticias</h1>
                    <aside class="aside-home">
                        <div class="item1">
                            <h1>Novo Poder de Hulk ficou mais forte</h1>
                            <img src="imagens/hulk.jpg" alt="hulk">
                            <div class="item-overlay top"></div>
                        </div>
                        <div class="item1">
                            <h1>Doutor Estranho com um novo HQ</h1>
                            <img src="imagens/doutorestranho.jpg" alt="hulk">
                            <div class="item-overlay top"></div>
                        </div>
                        <div class="item1">
                            <h1>A Arlequina volta a Franquia</h1>
                            <img src="imagens/arlequina.jpg" alt="hulk">
                            <div class="item-overlay top"></div>
                        </div>
                    </aside>
                </div>
                <!-- FINAL DO ASIDE -->
                <div class="posts-home">
                    <div class="centro-post">
                        <h1>Posts</h1>
                        <div class="conteudo-item">
                            <div class="item1">
                                <img src="imagens/supermanxhomenaranha.jpg" alt="superman x homem Aranha">
                                <div class="item-overlay top"></div>
                            </div>
                            <div class="texto-post">
                                <h1>Novo Lançamento da Luta entre Superman e Homem Aranha</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Proin eu nunc non ante fringilla finibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. 
                                    Nunc quis felis vitae lacus suscipit sagittis sit amet vel massa.</p>
                                <span class="data-publicacao">Data: 15/03/2017</span>
                                <a href="#" class='btn btn-default btn-hq-preto'>Ver Mais</a>
                            </div>
                        </div>
                        <div class="conteudo-item">
                            <div class="item1">
                                <img src="imagens/hoemaranha.jpg" alt="superman x homem Aranha">
                                <div class="item-overlay top"></div>
                            </div>
                            <div class="texto-post">
                                <h1>Novo Lançamento da Luta entre Superman e Homem Aranha</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Proin eu nunc non ante fringilla finibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. 
                                    Nunc quis felis vitae lacus suscipit sagittis sit amet vel massa.</p>
                                <span class="data-publicacao">Data: 15/03/2017</span>
                                <a href="#" class='btn btn-default btn-hq-preto'>Ver Mais</a>
                            </div>
                        </div>
                        <div class="conteudo-item">
                            <div class="item1">
                                <img src="imagens/capitao.jpg" alt="superman x homem Aranha">
                                <div class="item-overlay top"></div>
                            </div>
                            <div class="texto-post">
                                <h1>Novo Lançamento da Luta entre Superman e Homem Aranha</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Proin eu nunc non ante fringilla finibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. 
                                    Nunc quis felis vitae lacus suscipit sagittis sit amet vel massa.</p>
                                <span class="data-publicacao">Data: 15/03/2017</span>
                                <a href="#" class='btn btn-default btn-hq-preto'>Ver Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <h1>Principais Autores</h1>
                    <div class="col-lg-3">
                        <div class="item1">
                            <img src="imagens/supermanxhomenaranha.jpg" alt="superman x homem Aranha">
                            <div class="item-overlay top"></div>
                        </div>
                        <h2>Safari bug warning!</h2>
                        <p>Donec id elit non mi porta gravida at eget metus. 
                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                            fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. 
                            Donec sed odio dui. </p>
                        <p>
                            <a href="#" class='btn btn-default btn-hq-preto'>Ver Mais</a>
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <div class="item1">
                            <img src="imagens/supermanxhomenaranha.jpg" alt="superman x homem Aranha">
                            <div class="item-overlay top"></div>
                        </div>
                        <h2>Safari bug warning!</h2>
                        <p>Donec id elit non mi porta gravida at eget metus. 
                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                            fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. 
                            Donec sed odio dui. </p>
                        <p>
                            <a href="#" class='btn btn-default btn-hq-preto'>Ver Mais</a>
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <div class="item1">
                            <img src="imagens/supermanxhomenaranha.jpg" alt="superman x homem Aranha">
                            <div class="item-overlay top"></div>
                        </div>
                        <h2>Safari bug warning!</h2>
                        <p>Donec id elit non mi porta gravida at eget metus. 
                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                            fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. 
                            Donec sed odio dui. </p>
                        <p>
                            <a href="#" class='btn btn-default btn-hq-preto'>Ver Mais</a>
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <div class="item1">
                            <img src="imagens/supermanxhomenaranha.jpg" alt="superman x homem Aranha">
                            <div class="item-overlay top"></div>
                        </div>
                        <h2>Safari bug warning!</h2>
                        <p>Donec id elit non mi porta gravida at eget metus. 
                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                            fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. 
                            Donec sed odio dui. </p>
                        <p>
                            <a href="#" class='btn btn-default btn-hq-preto'>Ver Mais</a>
                        </p>
                    </div>
                </div>
            </div>

        </main>
    </div>