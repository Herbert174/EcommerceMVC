<?php

    class TransacaoModel
        {
        public function ResgatarAllTransacoesModel()
            {
            $transacao = new TransacaoDAO();
            return $transacao->ResgatarAllTransacoes();
            }

        public function ResgatarEnderecoEntregaTransacaoModel(TransacaoVO $Transacao)
            {
            $transacao = new TransacaoDAO();
            return $transacao->ResgatarEnderecoEntregaTransacao($Transacao);
            }

        public function ResgatarProdutosTransacaoModel(TransacaoVO $Transacao)
            {
            $transacao = new TransacaoDAO();
            return $transacao->ResgatarProdutosTransacao($Transacao);
            }
        }

?>