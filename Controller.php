<?php

    include_once "Framework/Controller/EcommerceController.php";

    session_start();

    $Produto = new ProdutoController();
    $Usuario = new UsuarioController();
    $Comentario = new ComentarioController();
    $Transacao = new TransacaoController();

    if(isset($_GET['Controller']))
        {
        $objeto = $_GET['Controller'];
        if($objeto == "Produto")
            {
            if(isset($_GET['Action']))
                {
                $metodo = $_GET['Action'];
                //Neste exemplo assim como acima utilizamos o GET para dessa vez passar um método dinamicamente
                eval("\$Produto->\$metodo();");
                }
            }

        if($objeto == "Usuario")
            {
            if(isset($_GET['Action']))
                {
                $metodo = $_GET['Action'];
                //Neste exemplo assim como acima utilizamos o GET para dessa vez passar um método dinamicamente
                eval("\$Usuario->\$metodo();");
                }
            }

        if($objeto == "Comentario")
            {
            if(isset($_GET['Action']))
                {
                $metodo = $_GET['Action'];
                //Neste exemplo assim como acima utilizamos o GET para dessa vez passar um método dinamicamente
                eval("\$Comentario->\$metodo();");
                }
            }

        if($objeto == "Transacao")
            {
            if(isset($_GET['Action']))
                {
                $metodo = $_GET['Action'];
                //Neste exemplo assim como acima utilizamos o GET para dessa vez passar um método dinamicamente
                eval("\$Transacao->\$metodo();");
                }
            }
        }

?>