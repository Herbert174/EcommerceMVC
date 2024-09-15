<?php

    class ProdutoModel //Classe responsável por aplicar as regras de negocio da aplicação
        {
        public function CadastrarProdutoModel(ProdutoVO $Produto)
            {
            $produto = new ProdutoDAO();
            return $produto->CadastrarProduto($Produto);
            }

        public function EditarProdutoModel(ProdutoVO $Produto)
            {
            $produto = new ProdutoDAO();
            return $produto->EditarProduto($Produto);
            }

        public function ExcluirProdutoModel(ProdutoVO $Produto)
            {
            $produto = new ProdutoDAO();
            return $produto->ExcluirProduto($Produto);
            }

        public function ResgatarProdutoModel(ProdutoVO $Produto)
            {
            $produto = new ProdutoDAO();
            return $produto->ResgatarProduto($Produto);
            }

        public function ResgatarProdutosCategoriaModel(ProdutoVO $Produtos)
            {
            $produtos = new ProdutoDAO();
            return $produtos->ResgatarProdutosCategoria($Produtos);
            }

        public function ResgatarTodosProdutoModel()
            {
            $produto = new ProdutoDAO();
            return $produto->ResgatarTodosProdutos();
            }

        public function RecuperarProdutosSlideModel()
            {
            $produtos = new ProdutoDAO();
            return $produtos->RecuperarProdutosSlide();
            }

        public function RecuperarProdutosDestaquesModel()
            {
            $produtos = new ProdutoDAO();
            return $produtos->RecuperarProdutosDestaques();
            }

        public function RecuperarProdutosCarrinhoModel($IdUsuario)
            {
            $produtos = new ProdutoDAO();
            return $produtos->RecuperarProdutosCarrinho($IdUsuario);
            }

        public function AtualizarProdutosDestaqueModel(ProdutoVO $Produto)
            {
            $produto = new ProdutoDAO();
            return $produto->AtualizarProdutosDestaque($Produto);
            }

        public function AtualizarProdutosSlideModel(ProdutoVO $Produto)
            {
            $produto = new ProdutoDAO();
            return $produto->AtualizarProdutosSlide($Produto);
            }

        public function AdicionarProdutoCarrinhoModel(ProdutoVO $Produto)
            {
            $produto = new ProdutoDAO();
            return $produto->AdicionarProdutoCarrinho($Produto);
            }

        public function RemoverProdutoCarrinhoModel(ProdutoVO $Produto)
            {
            $produto = new ProdutoDAO();
            return $produto->RemoverProdutoCarrinho($Produto);
            }

        public function AvalieProdutoModel(ProdutoVO $Produto)
            {
            $produto = new ProdutoDAO();
            return $produto->AvalieProduto($Produto);
            }
        }

?>