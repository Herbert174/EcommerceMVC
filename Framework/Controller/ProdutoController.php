<?php

    include_once("Framework/Model/Produto/ProdutoModel.php");
    include_once("Framework/Model/Produto/ProdutoDAO.php");
    include_once("Framework/Model/Produto/ProdutoVO.php");
    include_once("Framework/View/ProdutoView.php");

    class ProdutoController
        {
        public function CadastrarProdutoController()
            { //Cadastra produto enviado pelo cliente no banco de dados
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();

            $nome_produto = $_POST['nome_produto'];
            $resumo = $_POST['resumo'];
            $qntd_estoque = $_POST['qntd_estoque'];
            $preco = $_POST['preco'];
            $comprimento = $_POST['cumprimento'];
            $altura = $_POST['altura'];
            $largura = $_POST['largura'];
            $peso = $_POST['peso'];
            $categoria = $_POST['secao'];
            $info_tec = $_POST['info_tec'];
            $garantia = $_POST['garantia'];
            $embalagem = $_POST['embalagem'];

            $VO->defineNomeProduto($nome_produto);
            $VO->defineResumo($resumo);
            $VO->defineQntdEstoque($qntd_estoque);
            $VO->definePreco($preco);
            $VO->defineComprimento($comprimento);
            $VO->defineAltura($altura);
            $VO->defineLargura($largura);
            $VO->definePeso($peso);
            $VO->defineCategoria($categoria);
            $VO->defineInfoTec($info_tec);
            $VO->defineGarantia($garantia);
            $VO->defineEmbalagem($embalagem);

            if($RetornoModel = $Model->CadastrarProdutoModel($VO))
                {
                header("Location: crud");
                }
            }

        public function EditarProdutoController()
            { //Edita produto alterado pelo cliente no banco de dados
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();

            $IdProduto = $_GET['id_produto'];
            $nome_produto = $_POST['nome_produto'];
            $resumo = $_POST['resumo'];
            $qntd_estoque = $_POST['qntd_estoque'];
            $preco = $_POST['preco'];
            $comprimento = $_POST['cumprimento'];
            $altura = $_POST['altura'];
            $largura = $_POST['largura'];
            $peso = $_POST['peso'];
            $categoria = $_POST['secao'];
            $info_tec = $_POST['info_tec'];
            $garantia = $_POST['garantia'];
            $embalagem = $_POST['embalagem'];

            $VO->defineIdProduto($IdProduto);
            $VO->defineNomeProduto($nome_produto);
            $VO->defineResumo($resumo);
            $VO->defineQntdEstoque($qntd_estoque);
            $VO->definePreco($preco);
            $VO->defineComprimento($comprimento);
            $VO->defineAltura($altura);
            $VO->defineLargura($largura);
            $VO->definePeso($peso);
            $VO->defineCategoria($categoria);
            $VO->defineInfoTec($info_tec);
            $VO->defineGarantia($garantia);
            $VO->defineEmbalagem($embalagem);

            if($RetornoModel = $Model->EditarProdutoModel($VO))
                {
                header("Location: crud");
                }
            }

        public function ExcluirProdutoController()
            { //Excluir produto escolhido pelo cliente no banco de dados
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();

            $IdProduto = $_GET['id_produto'];

            $VO->defineIdProduto($IdProduto);

            if($RetornoModel = $Model->ExcluirProdutoModel($VO))
                {
                header("Location: crud");
                }
            }

        public function ExibirProdutoController()
            { //Recuperar produto e exibir ele formatado
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();
            $View = new ProdutoView();

            $IdProduto = $_GET['produto'];

            $VO->defineIdProduto($IdProduto);

            $produto = $Model->ResgatarProdutoModel($VO);
            return $View->ExibirProdutoView($produto);
            }

        public function RecuperarProdutoController()
            {
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();

            $IdProduto = $_GET['produto'];

            $VO->defineIdProduto($IdProduto);

            return $produto = $Model->ResgatarProdutoModel($VO);
            }

        public function ExibirProdutosCategoriaController()
            { //Recuperar produto e exibir ele formatado
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();
            $View = new ProdutoView();

            $IdCategoria = $_GET['secao'];

            $VO->defineIdProduto($IdCategoria);

            $produto = $Model->ResgatarProdutosCategoriaModel($VO);
            return $View->ExibirProdutosCategoriaView($produto);
            }

        public function ExibirTodosProdutoController()
            { //Recuperar todos os produto e exibe eles formatado
            $Model = new ProdutoModel();
            $View = new ProdutoView();

            $produtos = $Model->ResgatarTodosProdutoModel();
            return $View->ExibirTodosProdutosView($produtos);
            }

        public function ExibirProdutosDestaqueController($Categoria)
            { //Recuperar todos os produto e exibe eles formatado
            $View = new ProdutoView();
            return $View->ExibirProdutosDestaqueView($Categoria);
            }

        public function ExibirProdutosAbasController($Categoria)
            { //Recuperar todos os produto e exibe eles formatado
            $View = new ProdutoView();
            return $View->ExibirProdutosAbaView($Categoria);
            }

        public function ExibirPrincipaisCategoriasController()
            { //Recuperar todos os produto e exibe eles formatado
            $View = new ProdutoView();
            return $View->ExibirPrincipaisCategoriasView();
            }

        public function ExibirProdutosCarrinhoController()
            {
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();
            $View = new ProdutoView();

            if(isset($_SESSION['id_usuario']))
                {
                $IdUsuario = $_SESSION['id_usuario'];
                }else 
                    die('Parou aqui');

            $Produtos = $Model->RecuperarProdutosCarrinhoModel($IdUsuario);
            return $View->ExibirProdutosCarrinhoView($Produtos);
            }

        public function ExibirProdutosCarrinho1Controller()
            {
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();
            $View = new ProdutoView();

            if(isset($_SESSION['id_usuario']))
                {
                $IdUsuario = $_SESSION['id_usuario'];
                }else 
                    die('Parou aqui');

            $Produtos = $Model->RecuperarProdutosCarrinhoModel($IdUsuario);
            return $View->ExibirProdutosCarrinho1View($Produtos);
            }

        public function RecuperarProdutosSlideController()
            {
            $Model = new ProdutoModel();
            return $Model->RecuperarProdutosSlideModel();
            }

        public function RecuperarProdutosDestaquesController()
            {
            $Model = new ProdutoModel();
            return $Model->RecuperarProdutosDestaquesModel();
            }

        public function AtualizarProdutosDestaqueController()
            { //Recuperar todos os produto e exibe eles formatado
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();

            $IdProduto = $_GET['id_produto'];

            $VO->defineIdProduto($IdProduto);

            if($RetornoModel = $Model->AtualizarProdutosDestaqueModel($VO))
                {
                header("Location: editar_slide");
                }
            }
            
        public function AtualizarProdutosSlideController()
            { //Recuperar todos os produto e exibe eles formatado
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();

            $IdProduto = $_GET['id_produto'];

            $VO->defineIdProduto($IdProduto);

            if($RetornoModel = $Model->AtualizarProdutosSlideModel($VO))
                {
                header("Location: editar_slide");
                }
            }

        public function AtualizarPrecoController()
            {
            $valortotal = isset($_SESSION['valor_convertido']) ? $_SESSION['valor_convertido'] : 0;
            //$valortotal_formatado = number_format($valortotal, 2, ',', '.');
            echo $valortotal;
            }

        public function AdicionarProdutoCarrinhoController()
            {
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();

            $IdProduto = $_GET['produto_id'];
            $Qntd = $_POST['qntd'];

            $VO->defineIdProduto($IdProduto);
            $VO->defineQntdEstoque($Qntd);
            if($Model->AdicionarProdutoCarrinhoModel($VO))
                {
                header("Location: pagina_produto?produto=$IdProduto");
                }
            }

        public function RemoverProdutoCarrinhoController()
            {
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();

            $IdProduto = $_GET['produto_id'];

            $VO->defineIdProduto($IdProduto);
            if($Model->RemoverProdutoCarrinhoModel($VO))
                {
                header("Location: pagina_produto?produto=$IdProduto");
                }
            }

        public function AvalieProdutoController()
            {
            $Model = new ProdutoModel();
            $VO = new ProdutoVO();

            $IdProduto = $_GET['produto_id'];
            $estrela = $_POST['estrela'];

            $VO->defineIdProduto($IdProduto);
            $VO->defineAvaliacao($estrela);

            if(!empty($_POST['estrela'])&&isset($_SESSION['usuario']))
		        {
                if($Model->AvalieProdutoModel($VO))
                    {
                    header("Location: pagina_produto?produto=$IdProduto");
                    }
                }else{
                    header("Location: pagina_produto?produto=$IdProduto&avalie=1");
                    }
            }
        }

?>