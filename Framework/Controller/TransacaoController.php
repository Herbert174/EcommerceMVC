<?php

    include_once("Framework/Model/Transacao/TransacaoModel.php");
    include_once("Framework/Model/Transacao/TransacaoDAO.php");
    include_once("Framework/Model/Transacao/TransacaoVO.php");
    include_once("Framework/View/TransacaoView.php");

    class TransacaoController
        {
        public function ExibirAllTransacoesController()
            {
            $Model = new TransacaoModel();
            $View = new TransacaoView();

            $transacao = $Model->ResgatarAllTransacoesModel();
            return $View->ExibirAllTransacoesView($transacao);
            }

        public function ExibirEnderecoEntregaTransacaoController()
            {
            $Model = new TransacaoModel();
            $VO = new TransacaoVO();
            $View = new TransacaoView();

            $CodigoReferencia = $_GET['CodigoReferencia'];

            $VO->defineCodigoReferencia($CodigoReferencia);

            $transacao = $Model->ResgatarEnderecoEntregaTransacaoModel($VO);
            return $View->ExibirEnderecoEntregaTransacaoView($transacao);
            }

        public function ExibirProdutosTransacaoControler()
            {
            $Model = new TransacaoModel();
            $VO = new TransacaoVO();
            $View = new TransacaoView();

            $CodigoReferencia = $_GET['CodigoReferencia'];

            $VO->defineCodigoReferencia($CodigoReferencia);

            $transacao = $Model->ResgatarProdutosTransacaoModel($VO);
            return $View->ExibirProdutosTransacaoView($transacao);
            }
        }

?>