<?php

    $limitedoresumo = 350 // 300 caracteres

?>

<div class="container">
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
              // $foto = "imagens/$foto";
                $foto = "imagens/imgs/" . $foto;
              //  $foto = $foto . ".jpg";
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
                        <?php
                        //carregar os banners
                        $sql = "select * from noticia";
                        $consulta = $con->prepare($sql);
                        $consulta->execute();
                        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {

                            $id = $dados->id;
                            $titulo = $dados->titulo;
                            $foto = $dados->foto;
                            //lugar de onde esta a foto
                            $foto = "imagens/imgs/" . $foto;
                            //mostrar a foto na tela
                            echo "<a href='?pg=noticialeitura&id=$id' title='$titulo'>
                                    <div class='item1'>
                                        <h1>$titulo</h1>
                                        <img src='$foto' alt='$titulo'>
                                        <div class='item-overlay top'></div>
                                    </div>
                                   </a>";
                        }
                        ?>
                    </aside>
                </div>
                <!-- FINAL DO ASIDE -->
               
                
                <div class="posts-home">
                    <div class="centro-post">
                        <h1>Posts</h1>
                       <div class="conteudo-item">
                        <?php
                        //carregar os banners
                        $sql = "select * from post order by data desc limit 3";
                        $consulta = $con->prepare($sql);
                        $consulta->execute();
                        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {

                            $id = $dados->id;
                            $titulo = $dados->titulo;
                            $resumo = $dados->resumo;
                            $data = date('d/m/Y',strtotime($dados->data)); // Convertendo no formato dia/mes/ano
                            $foto = $dados->foto;
                            //lugar de onde esta a foto
                            $foto = "imagens/imgs/" . $foto;
                          
                          echo"<div><div class='item1'>
                                <img src='$foto' width='700' height='300'>
                                <div class='item-overlay top'></div>
                            </div>
                            <div class='texto-post'>
                                <h1>$titulo</h1>
                                <p>".substr($resumo,0,$limitedoresumo)."...</p>
                                <span class='data-publicacao'>$data</span>
                                <a href='?pg=postleitura&id=$id' class='btn btn-default btn-hq-preto'>Ver Mais</a>
                            </div>
                        </div>";
                    }
                    ?>
                               </div>
                        </div>
                   
               
            </div>
            <br>
            <br>

            <div class="container" style="margin-top: 119px">
                <div class="row">
                    <h1>Principais Autores</h1>
                    <?php
                        //carregar os banners
                        $sql = "select * from autor";
                        $consulta = $con->prepare($sql);
                        $consulta->execute();
                        while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {

                            $id = $dados->id;
                            $nome = $dados->nome;
                            $descricao = $dados->descricao;
                            $foto = $dados->foto;
                            //lugar de onde esta a foto
                            $foto = "imagens/imgs/" . $foto;
                       
                        echo"<div class='col-lg-3'>
                        <div class='item1'>
                        <img class='img-circle' src='$foto' width='300' height='100' style='padding:0px;'>
                        <div class= 'item-overlay top'></div>
                        </div>
                        <h2 style='margin-right: 100px; font-size: 30px; width: 100%;padding-left: 112px;'>$nome</h2>
                        
                       
                        <p style='padding-left: 112px;'>
                            <a href='?pg=autorleitura&id=$id' class='btn btn-default btn-hq-preto'>Ver Mais</a>
                        </p>
                    </div>";
                }
                ?>
                    
                    </div>
                </div>
            </div>

        </main>
    </div>