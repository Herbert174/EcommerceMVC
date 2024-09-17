<?php

    class ProdutoView
        {
        public function ExibirProdutoView($produto)
            {
            $avaliacoes = $produto['avaliacoes'];

            $preco_bruto = $produto['preco'];

            $preco = number_format($preco_bruto, 2, ',', '.');

            $avaliacao = $avaliacoes;
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }

            $retorno = '<div class="container borda1">';
            $retorno .= '<div class="row">';
            $retorno .= '<div class="col-md-6">';
            $retorno .= '<div class="img-produto">';
            $retorno .= '<img id="zoom_01" class="img-responsive img-custom2" src="'.$produto['imagem'].'"></div></div>';
            $retorno .= '<div class="col-md-6">';           
            $retorno .= '<div class="col-md-12">';
            $retorno .= '<h2>R$ '.$preco.'</h2>';
            $retorno .= '<p>Pagamento a vista ou parcelado</p>';
            $retorno .= '<p>Variedade na escolha do frete</p>'; 
            $retorno .= '<p>Quantidade no estoque: '.$produto['qntd_estoque'].'un.</p>';
            $retorno .= '<button class="btn btn-lg btn-custom1" id="comprar">Comprar</button>';
            $retorno .= '<h3>Avalie</h3>';
            $retorno .= '<ul class="avaliacao direita">';
            $retorno .= '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            $retorno .= '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            $retorno .= '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            $retorno .= '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            $retorno .= '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            $retorno .= '</ul> '.$produto['num_avaliacoes'].' <span>avaliações</span><br><br><br>';
            $retorno .= '<span>Nota geral do produto: <span class="negrito">'.$produto['avaliacoes'].'</span></span>';
            $retorno .= '<a href="https://web.whatsapp.com/send?phone=" target="_blank"><img class="img-whatsapp" src="imagens/whatsapp.png"> </a>';
            $retorno .= '</div></div></div>';
            $retorno .= '<div class="row"> <div class="col-md-12"> <div class="page-header"> <h2>Produto</h2>';
            $retorno .= '<p class="lead">Conheça mais sobre o produto</p> </div><!-- page-header -->';
            $retorno .= '<ul class="nav nav-tabs" role="tablist">';
            $retorno .= '<li class="active"><a href="#descricao" role="tab" data-toggle="tab">Descrição do produto</a></li>';
            $retorno .= '<li><a href="#info_tec" role="tab" data-toggle="tab">Informações técnicas</a></li>';
            $retorno .= '<li><a href="#embalagem" role="tab" data-toggle="tab">Conteúdo da embalagem</a></li>';
            $retorno .= '<li><a href="#garantia" role="tab" data-toggle="tab">Garantia</a></li> </ul>';
            $retorno .= '<div class="tab-content">';
            $retorno .= '<div class="tab-pane active" role="tabpanel" id="descricao"> <h2>DESCRIÇÃO DO PRODUTO</h2>';
            $retorno .= '<p>'.$produto['resumo'].'</p></div><div class="tab-pane" role="tabpanel" id="info_tec">';
            $retorno .= '<h2>INFORMAÇÕES TÉCNICAS</h2><p>'.$produto['info_tec'].'</p></div>';
            $retorno .= '<div class="tab-pane" role="tabpanel" id="embalagem"><h3>Conteúdo da Embalagem:</h3>';
            $retorno .= '<p>'.$produto['embalagem'].'</p>';
            $retorno .= '</div> <div class="tab-pane" role="tabpanel" id="garantia"> <h3>Garantia:</h3>';
            $retorno .= '<p>'.$produto['garantia'].'</p></div></div></div></div></div>';

            return $retorno;
            }

        public function ExibirProdutosDestaqueView($Categoria)
            {
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
        
            $lista = [];
            $destaque = [];
            $sql = " SELECT * FROM produtos ";
        
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                }
            
            $sql = " SELECT * FROM destaques WHERE id_destaques = '$Categoria' ";
        
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $destaque = mysqli_fetch_array($resultado_lista, MYSQLI_ASSOC);
                }
        
            $destaque1 = $destaque['destaque1'] - 1;
            $destaque2 = $destaque['destaque2'] - 1;
            $destaque3 = $destaque['destaque3'] - 1;
            $destaque4 = $destaque['destaque4'] - 1;
            $destaque5 = $destaque['destaque5'] - 1;
            $destaque6 = $destaque['destaque6'] - 1;
            $destaque7 = $destaque['destaque7'] - 1;
            $destaque8 = $destaque['destaque8'] - 1;
        
            $preco_bruto = $lista[$destaque1]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque1]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque1]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque1]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque1]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque2]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque2]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque2]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque2]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque2]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque3]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque3]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque3]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque3]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque3]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque4]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque4]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque4]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque4]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque4]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque5]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque5]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque5]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque5]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque5]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque6]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque6]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque6]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque6]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque6]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque7]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque7]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque7]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque7]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque7]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque8]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque8]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque8]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque8]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque8]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
            }

        public function ExibirProdutosAbaView($Categoria)
            {
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
        
            $lista = [];
            $destaque = [];
            $sql = " SELECT * FROM produtos ";
        
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                }
            
            $sql = " SELECT * FROM produtos_destaque WHERE id_destaque = '$Categoria' ";
        
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $destaque = mysqli_fetch_array($resultado_lista, MYSQLI_ASSOC);
                }
        
            $destaque1 = $destaque['novidade1'] - 1;
            $destaque2 = $destaque['novidade2'] - 1;
            $destaque3 = $destaque['novidade3'] - 1;
            $destaque4 = $destaque['mais_vendido'] - 1;
        
            $preco_bruto = $lista[$destaque1]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque1]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque1]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque1]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque1]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque2]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque2]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque2]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque2]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque2]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque3]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque3]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque3]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque3]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque3]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque4]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            $avaliacao = $lista[$destaque4]['avaliacoes'];
            if($avaliacao > 4)
                {
                $cinco_estrelas = 'ativo';
                }else $cinco_estrelas = '';
            if($avaliacao > 3 && $avaliacao <= 4)
                {
                $quatro_estrelas = 'ativo';
                }else $quatro_estrelas = '';
            if($avaliacao > 2 && $avaliacao <= 3)
                {
                $tres_estrelas = 'ativo';
                }else $tres_estrelas = '';
            if($avaliacao > 1 && $avaliacao <= 2)
                {
                $dois_estrelas = 'ativo';
                }else $dois_estrelas = '';
            if($avaliacao == 1)
                {
                $uma_estrela = 'ativo';
                }else $uma_estrela = '';
            if($avaliacao == null)
                {
                $cinco_estrelas = 'ativo';
                }
            echo '<div class="col-md-3 custom1 borda">';
            echo '<a href="pagina_produto?produto='.$lista[$destaque4]['id_produto'].'">';
            echo '<img class="img-responsive img-custom" src="'.$lista[$destaque4]['imagem'].'"></a><br>';
            echo '<p><b>Produto:</b> <span class="direita">'.$lista[$destaque4]['nome_produto'].'</span></p>';
            echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
            echo '<span class="negrito">Avaliação: </span>';
            echo '<ul class="avaliacao direita">';
            echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
            echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
            echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
            echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
            echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
            echo '</ul>';
            echo '</div>';
            }

        public function ExibirPrincipaisCategoriasView()
            {
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
        
            $lista = [];
            $destaque = [];
            $sql = " SELECT * FROM produtos ";
        
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                }
            
            $sql = " SELECT * FROM produtos_destaque WHERE id_destaque = 5 ";
        
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $destaque = mysqli_fetch_array($resultado_lista, MYSQLI_ASSOC);
                }
        
            $destaque1 = $destaque['novidade1'] - 1;
            $destaque2 = $destaque['novidade2'] - 1;
            $destaque3 = $destaque['novidade3'] - 1;
        
            $preco_bruto = $lista[$destaque1]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            echo '<div class="col-md-4">';
            echo '<a href="Produtos?secao=1">';
            echo '<img class="img-responsive img-custom3" src="'.$lista[$destaque1]['imagem'].'"></a><br>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque2]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            echo '<div class="col-md-4">';
            echo '<a href="Produtos?secao=3">';
            echo '<img class="img-responsive img-custom3" src="'.$lista[$destaque2]['imagem'].'"></a><br>';
            echo '</div>';
        
            $preco_bruto = $lista[$destaque3]['preco'];
            $preco = number_format($preco_bruto, 2, ',', '.');
            echo '<div class="col-md-4">';
            echo '<a href="Produtos?secao=2">';
            echo '<img class="img-responsive img-custom3" src="'.$lista[$destaque3]['imagem'].'"></a><br>';
            }

        public function ExibirProdutosCategoriaView($Produtos)
            {
            foreach ($Produtos as $produto)
                {
                $preco_bruto = $produto['preco'];
                $preco = number_format($preco_bruto, 2, ',', '.');
                $avaliacao = $produto['avaliacoes'];
                if($avaliacao > 4)
                    {
                    $cinco_estrelas = 'ativo';
                    }else $cinco_estrelas = '';
                if($avaliacao > 3 && $avaliacao <= 4)
                    {
                    $quatro_estrelas = 'ativo';
                    }else $quatro_estrelas = '';
                if($avaliacao > 2 && $avaliacao <= 3)
                    {
                    $tres_estrelas = 'ativo';
                    }else $tres_estrelas = '';
                if($avaliacao > 1 && $avaliacao <= 2)
                    {
                    $dois_estrelas = 'ativo';
                    }else $dois_estrelas = '';
                if($avaliacao == 1)
                    {
                    $uma_estrela = 'ativo';
                    }else $uma_estrela = '';
                if($avaliacao == null)
                    {
                    $cinco_estrelas = 'ativo';
                    }
                echo '<div class="col-md-3 custom1 borda">';
                echo '<a href="pagina_produto?produto='.$produto['id_produto'].'">';
                echo '<img class="img-responsive img-custom" src="'.$produto['imagem'].'"></a><br>';
                echo '<p><b>Produto:</b> <span class="direita">'.$produto['nome_produto'].'</span></p>';
                echo '<p><b>Preço:</b> <span class="direita">R$ '.$preco.'</span></p>';
                echo '<span class="negrito">Avaliação: </span>';
                echo '<ul class="avaliacao direita">';
                echo '<li class="star-icon '.$uma_estrela.'" data-avaliacao="1"></li>';
                echo '<li class="star-icon '.$dois_estrelas.'" data-avaliacao="2"></li>';
                echo '<li class="star-icon '.$tres_estrelas.'" data-avaliacao="3"></li>';
                echo '<li class="star-icon '.$quatro_estrelas.'" data-avaliacao="4"></li>';
                echo '<li class="star-icon '.$cinco_estrelas.'" data-avaliacao="5"></li>';
                echo '</ul>';
                echo '</div>';
                }
            }

        public function ExibirTodosProdutosView($Produtos)
            {
            foreach ($Produtos as $produto)
                {
                $preco_bruto = $produto['preco'];
                $preco = number_format($preco_bruto, 2, ',', '.');
            
                echo '<tr>';
                echo '<td scope="row">'.$produto['id_produto'].'</td>';
                echo '<td><img height="50" width="50" src="'.$produto['imagem'].'"></td>';
                echo '<td>'.$produto['nome_produto'].'</td>';
                echo '<td>'.$preco.'</td>';
                echo '<td>';
                echo '<a href="editar?produto='.$produto['id_produto'].'">[ Editar ]</a>';
                echo '<a class="btn_apagar" data-id_produto='.$produto['id_produto'].'>[ Excluir ]</a>';
                echo '</td>';
                echo '</tr>';
                }
            }

        public function ExibirProdutosCarrinhoView($Produtos)
            {
            $valor = 0;
            $valor1 = 0;
            $comprimento_soma = 0;
            $altura_soma      = 0;
            $largura_soma     = 0;
            $peso_soma        = 0;
            
            $_SESSION['valor'] = 0;

            foreach($Produtos as $Produto)
                {
                $produto_id          = $Produto['id_produto'];
                $produto_qntd        = $Produto['qntd_produto'];
                $nome_produto        = $Produto['nome_produto'];
                $preco_produto       = $Produto['preco'];
                $resumo_produto      = $Produto['resumo'];
                $imagem_produto      = $Produto['imagem'];
                $comprimento_produto = $Produto['cumprimento'];
                $altura_produto      = $Produto['altura'];
                $largura_produto     = $Produto['largura'];
                $peso_produto        = $Produto['peso'];

                $comprimento_soma = $comprimento_soma + $comprimento_produto;
                $altura_soma      = $altura_soma + $altura_produto;
                $largura_soma     = $largura_soma + $largura_produto;
                $peso_soma        = $peso_soma + $peso_produto;

                $valor = $valor + ($preco_produto * $produto_qntd);
                $preco_produto1 = number_format($preco_produto, 2, ',', '.');
                $valor1 = number_format($valor, 2, ',', '.');

                echo '<div class="row">';
                echo '<div class="col-md-12"><br>';
                echo '<div class="col-md-3">';
                echo '<img class="img-responsive img-custom3" src="'.$imagem_produto.'">';
                echo '<br>';
                echo '</div>';
                echo '<div class="col-md-6">';
                echo '<h4>'.$nome_produto.'</h4>';
                echo '<p>'.$resumo_produto.'</p>';
                echo '<p><span class="negrito">Valor: '.$preco_produto1.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A unidade</p>';
                echo '<p>'.$produto_qntd.' Unidades no carrinho</p>';
                echo '<a class="link-custom" href="Controller?Controller=Produto&Action=RemoverProdutoCarrinhoController&produto_id='.$produto_id.'"><button class="btn btn-default btn-block botao">Remover do carrinho</button></a>';
                echo '</div>';
                echo '</div>';
                echo '</div';
                }

            $_SESSION['valor'] = $valor;
            $_SESSION['valor_convertido'] = $valor1;

            $_SESSION['comprimento_produto'] = $comprimento_soma;
            $_SESSION['altura_produto']      = $altura_soma;
            $_SESSION['largura_produto']     = $largura_soma;
            $_SESSION['peso_produto']        = $peso_soma;
            }

        public function ExibirProdutosCarrinho1View($Produtos)
            {
            $valor = 0;
            $valor1 = 0;
            $comprimento_soma = 0;
            $altura_soma      = 0;
            $largura_soma     = 0;
            $peso_soma        = 0;
            
            $_SESSION['valor'] = 0;

            foreach($Produtos as $Produto)
                {
                $produto_id          = $Produto['id_produto'];
                $produto_qntd        = $Produto['qntd_produto'];
                $nome_produto        = $Produto['nome_produto'];
                $preco_produto       = $Produto['preco'];
                $resumo_produto      = $Produto['resumo'];
                $imagem_produto      = $Produto['imagem'];
                $comprimento_produto = $Produto['cumprimento'];
                $altura_produto      = $Produto['altura'];
                $largura_produto     = $Produto['largura'];
                $peso_produto        = $Produto['peso'];

                $comprimento_soma = $comprimento_soma + $comprimento_produto;
                $altura_soma      = $altura_soma + $altura_produto;
                $largura_soma     = $largura_soma + $largura_produto;
                $peso_soma        = $peso_soma + $peso_produto;

                $valor = $valor + ($preco_produto * $produto_qntd);
                $preco_produto1 = number_format($preco_produto, 2, ',', '.');
                $valor1 = number_format($valor, 2, ',', '.');

                echo '<div class="row">';
                echo '<div class="col-md-12"><br>';
                echo '<div class="col-md-5">';
                echo '<img class="img-responsive img-custom3" src="'.$imagem_produto.'">';
                echo '<br>';
                echo '</div>';
                echo '<div class="col-md-7">';
                echo '<h4>'.$nome_produto.'</h4>';
                echo '<p>'.$resumo_produto.'</p>';
                echo '<p><span class="negrito">Valor: '.$preco_produto.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A unidade</p>';
                echo '<p>'.$produto_qntd.' Unidades no carrinho</p>';
                echo '<a class="link-custom" href="Controller?Controller=Produto&Action=RemoverProdutoCarrinhoController&produto_id='.$produto_id.'"><button class="btn btn-default btn-block botao">Remover do carrinho</button></a>';
                echo '</div>';
                echo '</div>';
                echo '</div';
                }

            $_SESSION['valor'] = $valor;
            $_SESSION['valor_convertido'] = $valor1;

            $_SESSION['comprimento_produto'] = $comprimento_soma;
            $_SESSION['altura_produto']      = $altura_soma;
            $_SESSION['largura_produto']     = $largura_soma;
            $_SESSION['peso_produto']        = $peso_soma;
            }
        }

?>