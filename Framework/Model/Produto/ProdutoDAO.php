<?php

    class ProdutoDAO //Classe utilizada para fazer a comunicação com o banco de dados
        {
        public function CadastrarProduto(ProdutoVO $Produto)
            {
            $nome_produto = $Produto->retornaNomeProduto();
            $resumo = $Produto->retornaResumo();
            $qntd_estoque = $Produto->retornaQntdEstoque();
            $preco = $Produto->retornaPreco();
            $comprimento = $Produto->retornaComprimento();
            $altura = $Produto->retornaAltura();
            $largura = $Produto->retornaLargura();
            $peso = $Produto->retornaPeso();
            $categoria = $Produto->retornaCategoria();
            $info_tec = $Produto->retornaInfoTec();
            $garantia = $Produto->retornaGarantia();
            $embalagem = $Produto->retornaEmbalagem();
        
            if(isset($_FILES['imagem']))//Verifica se algo foi enviado para imagem através de FILES
                {
                $imagem = $_FILES['imagem'];//Guarda o arquivo em $imagem
        
                if($imagem['error'])//Caso o arquivo esteja corrompido, para o codigo e retorna a mensagem de erro
                    die("Falha ao enviar imagem");
        
                if($imagem['size'] > 4194304)//Verifica se o tamanho da imagem excede o tamanho maximo, 4MB
                    die("Arquivo excedeu o tamanho limite!! Max: 4MB");
        
                $pasta = "imagens/";//Define em $pasta o local onde a imagem será armazenada
                $nomeImagem = $imagem['name'];//Armazena o nome original do arquivo
                $novoNomeImagem = uniqid();//Gera um id unico para que os nomes das imagens não se repitam
                $extensao = strtolower(pathinfo($nomeImagem,PATHINFO_EXTENSION));//Retorna somente o nome da extensão da imagem/arquivo, transformando ele em minusculo se for preciso com a função strtolower
                
                if($extensao != "jpg" && $extensao != "png")//Verifica se a extensão enviada é jpg ou png
                    die("Formato de arquivo não aceito");
        
                $path = $pasta.$novoNomeImagem.".".$extensao;//Define o local onde a imagem será armazenada e o nome que será salvo
        
                $deu_certo = move_uploaded_file($imagem['tmp_name'], $path);//Move o arquivo selecionado para a pasta de imagens/arquivo do servidor
                }
        
            $sql = " INSERT INTO produtos(nome_produto, resumo, qntd_estoque, preco, cumprimento, altura, largura, peso, secao, info_tec, garantia, embalagem, imagem, nome_imagem) 
                        values('$nome_produto', '$resumo', '$qntd_estoque', '$preco', '$comprimento', '$altura', '$largura', '$peso', '$secao', '$info_tec', '$garantia', '$embalagem', '$path', '$nomeImagem') ";
            //Armazena em $sql o codigo que será enviado ao banco de dados
        
            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            if(mysqli_query($link, $sql))//Envia o codigo ao banco de dados, cadastrando as informações do produto enviado pelo usuario
                {
                //echo 'Produto registrado com sucesso!'
                return true;
                }else{
                    return false;
                    }
            }

        public function EditarProduto(ProdutoVO $Produto)
            {
            $IdProduto = $Produto->retornaIdProduto();
            $nome_produto = $Produto->retornaNomeProduto();
            $resumo = $Produto->retornaResumo();
            $qntd_estoque = $Produto->retornaQntdEstoque();
            $preco = $Produto->retornaPreco();
            $comprimento = $Produto->retornaComprimento();
            $altura = $Produto->retornaAltura();
            $largura = $Produto->retornaLargura();
            $peso = $Produto->retornaPeso();
            $categoria = $Produto->retornaCategoria();
            $info_tec = $Produto->retornaInfoTec();
            $garantia = $Produto->retornaGarantia();
            $embalagem = $Produto->retornaEmbalagem();
        
            if(!empty($_FILES['imagem']['name']))
                {
                $imagem = $_FILES['imagem'];
        
                //if($imagem['error'])
                    //die("Falha ao enviar arquivo");
        
                if($imagem['size'] > 2097152)
                    die("Arquivo excedeu o tamanho limite!! Max: 2MB");
        
                $pasta = "imagens/";
                $nomeImagem = $imagem['name'];//nome original do arquivo
                $novoNomeImagem = uniqid();//gera um id unico para que os nomes das imagens não se repitam
                $extensao = strtolower(pathinfo($nomeImagem,PATHINFO_EXTENSION));//retorna somento o nome da extensão da imagem/arquivo, transformando ele em minusculo se for preciso com a função strtolower
                
                if($extensao != "jpg" && $extensao != "png" && $extensao!= 0)//verifica se a extensão enviada é jpg ou png
                    die("Tipo de arquivo não aceito");
        
                $path = $pasta.$novoNomeImagem.".".$extensao;
        
                $deu_certo = move_uploaded_file($imagem['tmp_name'], $path);//Move o arquivo selecionado para a pasta de imagens/arquivo do servidor
                }

            $objDb = new database();
            $link = $objDb -> conecta_mysql();
        
            if($nome_produto && $resumo && empty($_FILES['imagem']['name']))
                {
                $sql = " UPDATE produtos SET nome_produto = '$nome_produto', resumo = '$resumo', qntd_estoque = '$qntd_estoque', preco = '$preco', cumprimento = '$cumprimento', altura = '$altura', largura = '$largura', peso = '$peso', secao = '$categoria', info_tec = '$info_tec', garantia = '$garantia', embalagem = '$embalagem' WHERE id_produto = '$IdProduto' ";
                if($resultado_id = mysqli_query($link, $sql))
                    {
                    return true;
                    }else return false;
                }else{
                        if($nome_produto && $resumo && !empty($_FILES['imagem']['name']))
                            {
                            $sql = " UPDATE produtos SET nome_produto = '$nome_produto', resumo = '$resumo', qntd_estoque = '$qntd_estoque', preco = '$preco', cumprimento = '$cumprimento', altura = '$altura', largura = '$largura', peso = '$peso', secao = '$categoria', info_tec = '$info_tec', garantia = '$garantia', embalagem = '$embalagem', imagem = '$path', nome_imagem = '$nomeImagem' WHERE id_produto = '$IdProduto' ";
                            if($resultado_id = mysqli_query($link, $sql))
                                {
                                return true;
                                }else return false;
                            }
                        }
            }

        public function ExcluirProduto(ProdutoVO $Produto)
            {
            $IdProduto = $Produto->retornaIdProduto();
        
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
            $sql = " DELETE FROM produtos WHERE id_produto = '$IdProduto' ";
            if($resultado_id = mysqli_query($link, $sql))
                {
                return true;
                }else return false;
            }

        public function ResgatarProduto(ProdutoVO $Produto)
            {
            $IdProduto = $Produto->retornaIdProduto();//Recupera o id do produto á ser consultado no banco de dados

            $sql = " SELECT * FROM produtos WHERE id_produto = '$IdProduto' ";
        
            $objDb = new database();//Instância a classe
            $link = $objDb -> conecta_mysql();//Executa função de conexão com o MySQL
        
            $resultado_id = mysqli_query($link, $sql);//Se conecta ao MySQL e envia o codigo da variavel $sql
        
            if($resultado_id)
                {
                $dados_produto = mysqli_fetch_array($resultado_id);
                if(isset($dados_produto['nome_produto']))
                    {
                    $_SESSION['id_produto']     = $dados_produto['id_produto'];
                    $_SESSION['nome_produto']   = $dados_produto['nome_produto'];
                    $_SESSION['qntd_estoque']   = $dados_produto['qntd_estoque'];
                    $_SESSION['preco']          = $dados_produto['preco'];
                    $_SESSION['resumo']         = $dados_produto['resumo'];
                    $_SESSION['imagem']         = $dados_produto['imagem'];
                    $_SESSION['avaliacoes']     = $dados_produto['avaliacoes'];
                    $_SESSION['num_avaliacoes'] = $dados_produto['num_avaliacoes'];
                    $_SESSION['info_tec']       = $dados_produto['info_tec'];
                    $_SESSION['embalagem']      = $dados_produto['embalagem'];
                    $_SESSION['garantia']       = $dados_produto['garantia'];
        
                    return $dados_produto;
                    }else
                        return false;
                }else 
                    die("Erro na consulta do banco de dados");
            }

        public function ResgatarProdutosCategoria(ProdutoVO $Produtos)
            {
            $IdCategoria = $Produtos->retornaIdProduto();//Recupera o id do produto á ser consultado no banco de dados

            $objDb = new database();//Instância objDb com as propriedades database de db.class
            $link = $objDb -> conecta_mysql();//Cria uma conexão com o banco de dados e armazena em link
        
            $lista = [];//Cria um array para armazenar o resultado da leitura do banco de dados
            $sql = " SELECT * FROM produtos WHERE secao = '$IdCategoria' ";//Armazena em sql o codigo que será enviado para o banco de dados
        
            if($resultado_lista = mysqli_query($link, $sql))/*Se conecta com o banco de dados e envia o codigo de sql
                                                            recuperando o retorno em resultado_lista*/
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }//Reorganiza em lista o retorno do banco de dados armazenado em resultado_lista
            }

        public function ResgatarTodosProdutos()
            {
            $objDb = new database();//Instância objDb com as propriedades database de db.class
            $link = $objDb -> conecta_mysql();//Cria uma conexão com o banco de dados e armazena em link
        
            $lista = [];//Cria um array para armazenar o resultado da leitura do banco de dados
            $sql = " SELECT * FROM produtos ";//Armazena em sql o codigo que será enviado para o banco de dados
        
            if($resultado_lista = mysqli_query($link, $sql))/*Se conecta com o banco de dados e envia o codigo de sql
                                                            recuperando o retorno em resultado_lista*/
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }//Reorganiza em lista o retorno do banco de dados armazenado em resultado_lista
            }

        public function RecuperarProdutosSlide()
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
                        
            $sql = " SELECT * FROM produtos_destaque WHERE id_destaque = 1 ";
                    
            if($resultado_lista = mysqli_query($link, $sql))
                {
                $destaque = mysqli_fetch_array($resultado_lista, MYSQLI_ASSOC);
                }
            $Mais_vendido = $destaque['mais_vendido'] - 1;
            $Novidades1 = $destaque['novidade1'] - 1;
            $Novidades2 = $destaque['novidade2'] - 1;
            $Novidades3 = $destaque['novidade3'] - 1;
            $Destaque = $destaque['destaque'] - 1;
                    
            $_SESSION['id_mais_vendido'] = $lista[$Mais_vendido]['id_produto'];
            $_SESSION['imagem_mais_vendido'] = $lista[$Mais_vendido]['imagem'];
            $_SESSION['id_novidades1'] = $lista[$Novidades1]['id_produto'];
            $_SESSION['imagem_novidades1'] = $lista[$Novidades1]['imagem'];
            $_SESSION['id_novidades2'] = $lista[$Novidades2]['id_produto'];
            $_SESSION['imagem_novidades2'] = $lista[$Novidades2]['imagem'];
            $_SESSION['id_novidades3'] = $lista[$Novidades3]['id_produto'];
            $_SESSION['imagem_novidades3'] = $lista[$Novidades3]['imagem'];
            $_SESSION['id_destaque'] = $lista[$Destaque]['id_produto'];
            $_SESSION['imagem_destaque'] = $lista[$Destaque]['imagem'];

            return true;
            }

        public function RecuperarProdutosDestaques()
            {
            $objDb = new database();
            $link = $objDb -> conecta_mysql();
        
            $sql = " SELECT * FROM produtos_destaque ";
            if($resultado_id = mysqli_query($link, $sql))
                {	
                $dados_destaque = mysqli_fetch_all($resultado_id, MYSQLI_ASSOC);
                }
        
            $sql = " SELECT * FROM destaques ";
            if($resultado_id = mysqli_query($link, $sql))
                {	
                $dados_destaques = mysqli_fetch_all($resultado_id, MYSQLI_ASSOC);
                }

            $retorno = [];
            $retorno[0] = $dados_destaque;
            $retorno[1] = $dados_destaques;

            return $retorno;
            }

        public function RecuperarProdutosCarrinho($IdUsuario)
            {
            $sql = " SELECT * FROM carrinho_de_compras as C LEFT JOIN produtos as P on(C.id_produto = P.id_produto) WHERE C.id = '$IdUsuario' ";
        
            $objDb = new database();//Instância a classe
            $link = $objDb -> conecta_mysql();//Executa função de conexão com o MySQL
        
            if($resultado_carrinho = mysqli_query($link, $sql))
                {
                $listaProdutos = mysqli_fetch_all($resultado_carrinho, MYSQLI_ASSOC);
                return $listaProdutos;
                }else 
                    die("Erro ao realizar a consulta no banco de dados");
            }

        public function AtualizarProdutosDestaque(ProdutoVO $Produto)
            {
            $IdProduto = $Produto->retornaIdProduto();//Recupera o id do produto á ser consultado no banco de dados
            $destaque1 = $_POST['destaque1'];
            $destaque2 = $_POST['destaque2'];
            $destaque3 = $_POST['destaque3'];
            $destaque4 = $_POST['destaque4'];
            $destaque5 = $_POST['destaque5'];
            $destaque6 = $_POST['destaque6'];
            $destaque7 = $_POST['destaque7'];
            $destaque8 = $_POST['destaque8'];

            $objDb = new database();
            $link = $objDb -> conecta_mysql();
        
            $sql = " UPDATE destaques SET destaque1 = '$destaque1', destaque2 = '$destaque2', destaque3 = '$destaque3', ";
            $sql .= " destaque4 = '$destaque4', destaque5 = '$destaque5', destaque6 = '$destaque6', destaque7 = '$destaque7', ";
            $sql .= " destaque8 = '$destaque8' WHERE id_destaques = '$IdProduto' ";
        
            if($resultado_id = mysqli_query($link, $sql))
                {
                return true;
                } else 
                    return false;
            }

        public function AtualizarProdutosSlide(ProdutoVO $Produto)
            {
            $IdProduto = $Produto->retornaIdProduto();//Recupera o id do produto á ser consultado no banco de dados
            $novidade1 = $_POST['novidade1'];
            $novidade2 = $_POST['novidade2'];
            $novidade3 = $_POST['novidade3'];
            $mais_vendido = $_POST['mais_vendido'];
            $destaque = $_POST['destaque'];

            $objDb = new database();
            $link = $objDb -> conecta_mysql();
        
            $sql = " UPDATE produtos_destaque SET novidade1 = '$novidade1', novidade2 = '$novidade2', novidade3 = '$novidade3', mais_vendido = '$mais_vendido', destaque = '$destaque' WHERE id_destaque = '$IdProduto' ";
            if($resultado_id = mysqli_query($link, $sql))
                {
                return true;
                }else
                    return false;
            }

        public function AdicionarProdutoCarrinho(ProdutoVO $Produto)
            {
            $usuario = $_SESSION['id_usuario'];
            $id_produto = $Produto->retornaIdProduto();
            $qntd_produto = $Produto->retornaQntdEstoque();

            if($qntd_produto <= 0 || null)
                {
                $qntd_produto = 1;
                }
        
            $sql = " SELECT qntd_estoque FROM produtos WHERE id_produto = '$id_produto' ";
        
            $objDb = new database();//Instância a classe
            $link = $objDb -> conecta_mysql();//Executa função de conexão com o MySQL
        
            if($consulta = mysqli_query($link, $sql))
                {
                $resultado_consulta = mysqli_fetch_array($consulta);
                $estoque = $resultado_consulta['qntd_estoque'];
                if($qntd_produto <= $estoque)
                    {
                    $sql = " INSERT INTO carrinho_de_compras(id, id_produto, qntd_produto) values('$usuario', '$id_produto', '$qntd_produto') ";
                    if($resultado = mysqli_query($link, $sql))
                        {
                        return true;
                        }else 
                            die("Falha ao realizar o registro no banco de dados");
                    }
                }
            }

        public function RemoverProdutoCarrinho(ProdutoVO $Produto)
            {
            $usuario = $_SESSION['id_usuario'];
            $id_produto = $Produto->retornaIdProduto();

            $sql = " DELETE FROM carrinho_de_compras WHERE id_produto = '$id_produto' AND id = '$usuario' ";

            $objDb = new database();//Instância a classe
            $link = $objDb -> conecta_mysql();//Executa função de conexão com o MySQL

            if($resultado = mysqli_query($link, $sql))
                {
                return true;
                }else
                    die("Falha ao realizar o registro no banco de dados");
            }

        public function AvalieProduto(ProdutoVO $Produto)
            {
            $IdProduto = $Produto->retornaIdProduto();
            $Avaliacao = $Produto->retornaAvaliacao();

            $sql = " SELECT avaliacoes, num_avaliacoes, total_avaliacoes FROM produtos WHERE id_produto = '$IdProduto' ";

            $objDb = new database();
            $link = $objDb -> conecta_mysql();

            if($resultado_produto = mysqli_query($link, $sql))
                {
                $dados_produto    = mysqli_fetch_array($resultado_produto);

                $avaliacao        = $dados_produto['avaliacoes'];
                $num_avaliacao    = $dados_produto['num_avaliacoes'];
                $total_avaliacao  = $dados_produto['total_avaliacoes'];

                $num_avaliacoes = $num_avaliacao + 1;
                $total_avaliacoes = $total_avaliacao + $Avaliacao;
                (float)$avaliacoes = $total_avaliacoes / $num_avaliacoes;

                $sql = " UPDATE produtos SET avaliacoes = '$avaliacoes', num_avaliacoes = '$num_avaliacoes', total_avaliacoes = '$total_avaliacoes' WHERE id_produto = '$IdProduto' ";
                
                if(mysqli_query($link, $sql))
                    {
                    return true;
                    }else{
                        die("erro ao registrar avaliação");
                        }
                }
            }
        }

?>