<?php

    class TransacaoVO //Classe utilizada para definir os atributos do objeto e criar os gets e sets
        {
        private $IdTransacao;
        private $CodigoReferencia;
        private $IdUsuario;
        private $ValorCompra;
        private $NomeComprador;
        private $CodigoTransacao;
        private $StatusPagamento;
        private $Rua;
        private $Numero;
        private $Complemento;
        private $Bairro;
        private $CEP;
        private $Cidade;
        private $Estado;
        private $Pais;
        private $Produtos;
        private $TipoFrete;

        public function retornaIdTransacao()
            {
            return $this->IdTransacao;
            }

        public function defineIdTransacao($IdTransacaoEnviado)
            {
            $this->IdTransacao = $IdTransacaoEnviado;
            }

        public function retornaCodigoReferencia()
            {
            return $this->CodigoReferencia;
            }

        public function defineCodigoReferencia($CodigoReferenciaEnviado)
            {
            $this->CodigoReferencia = $CodigoReferenciaEnviado;
            }

        public function retornaIdUsuario()
            {
            return $this->IdUsuario;
            }

        public function defineIdUsuario($IdUsuarioEnviado)
            {
            $this->IdUsuario = $IdUsuarioEnviado;
            }

        public function retornaValorCompra()
            {
            return $this->ValorCompra;
            }

        public function defineValorCompra($ValorCompraEnviado)
            {
            $this->ValorCompra = $ValorCompraEnviado;
            }

        public function retornaCodigoTransacao()
            {
            return $this->CodigoTransacao;
            }

        public function defineCodigoTransacao($CodigoTransacaoEnviado)
            {
            $this->CodigoTransacao = $CodigoTransacaoEnviado;
            }

        public function retornaStatusPagamento()
            {
            return $this->StatusPagamento;
            }

        public function defineStatusPagamento($StatusPagamentoEnviado)
            {
            $this->StatusPagamento = $StatusPagamentoEnviado;
            }

        public function retornaRua()
            {
            return $this->Rua;
            }

        public function defineRua($RuaEnviado)
            {
            $this->Rua = $RuaEnviado;
            }

        public function retornaNumero()
            {
            return $this->Numero;
            }

        public function defineNumero($NumeroEnviado)
            {
            $this->Numero = $NumeroEnviado;
            }

        public function retornaComplemento()
            {
            return $this->Complemento;
            }

        public function defineComplemento($ComplementoEnviado)
            {
            $this->Complemento = $ComplementoEnviado;
            }

        public function retornaBairro()
            {
            return $this->Bairro;
            }

        public function defineBairro($BairroEnviado)
            {
            $this->Bairro = $BairroEnviado;
            }

        public function retornaCEP()
            {
            return $this->CEP;
            }

        public function defineCEP($CEPEnviado)
            {
            $this->CEP = $CEPEnviado;
            }

        public function retornaCidade()
            {
            return $this->Cidade;
            }

        public function defineCidade($CidadeEnviado)
            {
            $this->Cidade = $CidadeEnviado;
            }

        public function retornaEstado()
            {
            return $this->Estado;
            }

        public function defineEstado($EstadoEnviado)
            {
            $this->Estado = $EstadoEnviado;
            }

        public function retornaPais()
            {
            return $this->Pais;
            }

        public function definePais($PaisEnviado)
            {
            $this->Pais = $PaisEnviado;
            }

        public function retornaProdutos()
            {
            return $this->Produtos;
            }

        public function defineProdutos($ProdutosEnviado)
            {
            $this->Produtos = $ProdutosEnviado;
            }

        public function retornaTipoFrete()
            {
            return $this->TipoFrete;
            }

        public function defineTipoFrete($TipoFreteEnviado)
            {
            $this->TipoFrete = $TipoFreteEnviado;
            }

        public function retornaNomeComprador()
            {
            return $this->NomeComprador;
            }

        public function defineNomeComprador($NomeCompradorEnviado)
            {
            $this->NomeComprador = $NomeCompradorEnviado;
            }
        }

?>