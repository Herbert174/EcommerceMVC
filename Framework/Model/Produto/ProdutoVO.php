<?php

    class ProdutoVO //Classe utilizada para definir os atributos do objeto e criar os gets e sets
        {
        private $IdProduto;
        private $NomeProduto;
        private $Resumo;
        private $QntdEstoque;
        private $Ativo;
        private $Preco;
        private $Imagem;
        private $Comprimento;
        private $Altura;
        private $Largura;
        private $Peso;
        private $Avaliacao;
        private $QntdAvaliacoes;
        private $TotalAvaliacoes;
        private $Categoria;
        private $InfoTec;
        private $Embalagem;
        private $Garantia;

        public function retornaIdProduto()
            {
            return $this->IdProduto;
            }

        public function defineIdProduto($IdProdutoEnviado)
            {
            $this->IdProduto = $IdProdutoEnviado;
            }

        public function retornaNomeProduto()
            {
            return $this->NomeProduto;
            }

        public function defineNomeProduto($NomeProdutoEnviado)
            {
            $this->NomeProduto = $NomeProdutoEnviado;
            }

        public function retornaResumo()
            {
            return $this->Resumo;
            }

        public function defineResumo($ResumoEnviado)
            {
            $this->Resumo = $ResumoEnviado;
            }

        public function retornaQntdEstoque()
            {
            return $this->QntdEstoque;
            }

        public function defineQntdEstoque($QntdEstoqueEnviado)
            {
            $this->QntdEstoque = $QntdEstoqueEnviado;
            }

        public function retornaAtivo()
            {
            return $this->Ativo;
            }

        public function defineAtivo($AtivoEnviado)
            {
            $this->Ativo = $AtivoEnviado;
            }

        public function retornaPreco()
            {
            return $this->Preco;
            }

        public function definePreco($PrecoEnviado)
            {
            $this->Preco = $PrecoEnviado;
            }

        public function retornaImagem()
            {
            return $this->Imagem;
            }

        public function defineImagem($ImagemEnviado)
            {
            $this->Imagem = $ImagemEnviado;
            }

        public function retornaComprimento()
            {
            return $this->Comprimento;
            }

        public function defineComprimento($ComprimentoEnviado)
            {
            $this->Comprimento = $ComprimentoEnviado;
            }

        public function retornaAltura()
            {
            return $this->Altura;
            }

        public function defineAltura($AlturaEnviado)
            {
            $this->Altura = $AlturaEnviado;
            }

        public function retornaLargura()
            {
            return $this->Largura;
            }

        public function defineLargura($LarguraEnviado)
            {
            $this->Largura = $LarguraEnviado;
            }

        public function retornaPeso()
            {
            return $this->Peso;
            }

        public function definePeso($PesoEnviado)
            {
            $this->Peso = $PesoEnviado;
            }

        public function retornaAvaliacao()
            {
            return $this->Avaliacao;
            }

        public function defineAvaliacao($AvaliacaoEnviado)
            {
            $this->Avaliacao = $AvaliacaoEnviado;
            }

        public function retornaQntdAvaliacao()
            {
            return $this->QntdAvaliacoes;
            }

        public function defineQntdAvaliacao($QntdAvaliacoesEnviado)
            {
            $this->QntdAvaliacoes = $QntdAvaliacoesEnviado;
            }

        public function retornaTotalAvaliacao()
            {
            return $this->TotalAvaliacoes;
            }

        public function defineTotalAvaliacao($TotalAvaliacoesEnviado)
            {
            $this->TotalAvaliacoes = $TotalAvaliacoesEnviado;
            }

        public function retornaCategoria()
            {
            return $this->Categoria;
            }

        public function defineCategoria($CategoriaEnviado)
            {
            $this->Categoria = $CategoriaEnviado;
            }

        public function retornaInfoTec()
            {
            return $this->InfoTec;
            }

        public function defineInfoTec($InfoTecEnviado)
            {
            $this->InfoTec = $InfoTecEnviado;
            }

        public function retornaEmbalagem()
            {
            return $this->Embalagem;
            }

        public function defineEmbalagem($EmbalagemEnviado)
            {
            $this->Embalagem = $EmbalagemEnviado;
            }

        public function retornaGarantia()
            {
            return $this->Garantia;
            }

        public function defineGarantia($GarantiaEnviado)
            {
            $this->Garantia = $GarantiaEnviado;
            }
        }

?>