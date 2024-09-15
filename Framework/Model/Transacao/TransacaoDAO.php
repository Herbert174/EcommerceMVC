<?php

    class TransacaoDAO
        {
        public function ResgatarAllTransacoes()
            {
            $objDb = new database();//Instância objDb com as propriedades database de db.class
            $link = $objDb -> conecta_mysql();//Cria uma conexão com o banco de dados e armazena em link
        
            $lista = [];//Cria um array para armazenar o resultado da leitura do banco de dados
            $sql = " SELECT codigo_referencia, nome_comprador, status_pagamento, codigo_transacao, valor_compra FROM transacoes ORDER BY id_transacao DESC ";//Armazena em sql o codigo que será enviado para o banco de dados
        
            if($resultado_lista = mysqli_query($link, $sql))/*Se conecta com o banco de dados e envia o codigo de sql
                                                            recuperando o retorno em resultado_lista*/
                {
                $lista = mysqli_fetch_all($resultado_lista, MYSQLI_ASSOC);
                return $lista;
                }//Reorganiza em lista o retorno do banco de dados armazenado em resultado_lista
            }

        public function ResgatarEnderecoEntregaTransacao(TransacaoVO $Transacao)
            {
            $objDb = new database();//Instância objDb com as propriedades database de db.class
            $link = $objDb -> conecta_mysql();//Cria uma conexão com o banco de dados e armazena em link
        
            $CodigoReferencia = $Transacao->retornaCodigoReferencia();
        
            $lista = [];//Cria um array para armazenar o resultado da leitura do banco de dados
            $sql = " SELECT endereco, numero, complemento, bairro, cep, cidade, estado, pais, tipoFrete FROM transacoes where codigo_referencia = '$CodigoReferencia' ";//Armazena em sql o codigo que será enviado para o banco de dados
        
            if($resultado_lista = mysqli_query($link, $sql))					
                {
                $lista = mysqli_fetch_array($resultado_lista);
                return $lista;
                }
            }

        public function ResgatarProdutosTransacao(TransacaoVO $Transacao)
            {
            $objDb = new database();//Instância objDb com as propriedades database de db.class
            $link = $objDb -> conecta_mysql();//Cria uma conexão com o banco de dados e armazena em link
        
            $CodigoReferencia = $Transacao->retornaCodigoReferencia();
        
            $lista = [];//Cria um array para armazenar o resultado da leitura do banco de dados
            $sql = " SELECT produtos FROM transacoes where codigo_referencia = '$CodigoReferencia' ";//Armazena em sql o codigo que será enviado para o banco de dados
        
            if($resultado_lista = mysqli_query($link, $sql))					
                {
                $lista = mysqli_fetch_array($resultado_lista);
                return $lista;
                }
            }
        }

?>