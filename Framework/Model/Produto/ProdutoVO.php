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
        private $QntdImg;
        private $Tamanho1;
        private $Tamanho2;
        private $Tamanho3;
        private $Tamanho4;
        private $Cor1;
        private $Cor2;
        private $Cor3;
        private $Cor4;
        private $DifTamanho;
        private $DifCor;
        private $TamanhoEscolhido;
        private $CorEscolhido;

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

        public function retornaQntdImg()
            {
            return $this->QntdImg;
            }

        public function defineQntdImg($QntdImgEnviado)
            {
            $this->QntdImg = $QntdImgEnviado;
            }

        public function retornaTamanho1()
            {
            return $this->Tamanho1;
            }

        public function defineTamanho1($Tamanho1Enviado)
            {
            $this->Tamanho1 = $Tamanho1Enviado;
            }

        public function retornaTamanho2()
            {
            return $this->Tamanho2;
            }

        public function defineTamanho2($Tamanho2Enviado)
            {
            $this->Tamanho2 = $Tamanho2Enviado;
            }

        public function retornaTamanho3()
            {
            return $this->Tamanho3;
            }

        public function defineTamanho3($Tamanho3Enviado)
            {
            $this->Tamanho3 = $Tamanho3Enviado;
            }

        public function retornaTamanho4()
            {
            return $this->Tamanho4;
            }

        public function defineTamanho4($Tamanho4Enviado)
            {
            $this->Tamanho4 = $Tamanho4Enviado;
            }

        public function retornaCor1()
            {
            return $this->Cor1;
            }

        public function defineCor1($Cor1Enviado)
            {
            $this->Cor1 = $Cor1Enviado;
            }        
            
        public function retornaCor2()
            {
            return $this->Cor2;
            }

        public function defineCor2($Cor2Enviado)
            {
            $this->Cor2 = $Cor2Enviado;
            }

        public function retornaCor3()
            {
            return $this->Cor3;
            }

        public function defineCor3($Cor3Enviado)
            {
            $this->Cor3 = $Cor3Enviado;
            }

        public function retornaCor4()
            {
            return $this->Cor4;
            }

        public function defineCor4($Cor4Enviado)
            {
            $this->Cor4 = $Cor4Enviado;
            }

        public function retornaDifTam()
            {
            return $this->DifTamanho;
            }

        public function defineDifTam($DifTamEnviado)
            {
            $this->DifTamanho = $DifTamEnviado;
            }

        public function retornaDifCor()
            {
            return $this->DifCor;
            }

        public function defineDifCor($DifCorEnviado)
            {
            $this->DifCor = $DifCorEnviado;
            }

        public function retornaCorEscolhido()
            {
            return $this->CorEscolhido;
            }

        public function defineCorEscolhido($CorEnviado)
            {
            $this->CorEscolhido = $CorEnviado;
            }

        public function retornaTamanhoEscolhido()
            {
            return $this->TamanhoEscolhido;
            }

        public function defineTamanhoEscolhido($TamanhoEnviado)
            {
            $this->TamanhoEscolhido = $TamanhoEnviado;
            }
        }

?>