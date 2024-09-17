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
            $VO = new TransacaoVO();
            $View = new TransacaoView();

            if(isset($_GET['status']))
                {
                $comprador = $_GET['comprador'];
                $status = $_GET['status'];

                $VO->defineNomeComprador($comprador);
                $VO->defineStatusPagamento($status);

                $transacao = $Model->ResgatarFiltroTransacoesModel($VO);
                return $View->ExibirAllTransacoesView($transacao);
                }

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

        public function ExibirSelectCompradoresController()
            {
            $Model = new TransacaoModel();
            $View = new TransacaoView();

            $Compradores = $Model->RecuperarCompradoresModel();
            return $View->ExibirSelectCompradoresView($Compradores);
            }
        }

?>