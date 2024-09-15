<?php

    session_start();

    $erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
    $erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;

    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

    if(isset($_SESSION['usuario']))
        {
        $usuario = $_SESSION['usuario'];
        }else{
             $usuario = 'Faça o login para iniciar as compras';
             }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Loja Online</title>
        <link rel="icon" href="imagens/twitter.png">

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="estilo.css" rel="stylesheet">

        <!-- Jquery -->
        <script src="jquery-3.6.0.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        
    </head>

    <body>
        <!-- Barra de Navegação -->
        <nav class="navbar navbar-default navbar-fixed-top navbar-custom">

            <!-- container-fluid para o menu aparecer na página inteira -->
            <div class="container-fluid">

                <!-- Barra de Navegação quando em colapso -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target = "#Navegacao">
                        <span class="sr-only">Alterar Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Barra de Navegação em estado normal -->
                <div class="collapse navbar-collapse" id="Navegacao">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index">Início</a></li>
                        <li><a href="#">Contato</a></li>
                        <li><a href="#">Cadastrar</a></li>
                        <li class="<?= $erro == 1 ? 'open' : '' ?>">
                            <a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
                            <ul class="dropdown-menu menu-custom" aria-labelledby="entrar">
                                <div class="col-md-12">
                                    <p style="color: black;">Acesse sua conta e vá as compras</p>
                                    
                                    <form method="post" action="Controller?Controller=Usuario&Action=LoginUsuarioController" id="formLogin">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
                                        </div>
                
                                        <div class="form-group">
                                            <input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
                                        </div>
                
                                        <button type="buttom" class="btn btn-custom1" id="btn_login">Entrar</button>

                                        <br /><br />                
                                    </form>
                                    <?php
                                        if($erro == 1)
                                            {   
                                            echo '<font color="#FF0000">Usuario e ou senha invalido(s)</font>';
                                            }
                                    ?>
                                </div>
                            </ul>
                        </li>
                        <li><button class="btn_custom" data-toggle="modal" data-target="#modal-mensagem"><img class="carrinho_compras" src="imagens/Emote1.png">Meu Carrinho</button></li>
                    </ul>

                    <img class="nav navbar-nav navbar-left imgcustom" src="imagens/twitter.png">
                    <div class="nav navbar-nav navbar-left nav-custom">
                        Bem vindo: <span class="negrito"><?= $usuario ?></span>
                    </div>
                </div> 

            <!-- Container fluid -->
            </div>

        <!-- Barra de navegação -->
        </nav>
        
        <br><br>
		<div class="container-fluid"><!-- Estrutura onde será exibido a lista do CRUD de produtos -->
            <br><br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4 borda3">
                            <div class="col-md-12 ">
                                <h2>Cadastrar-se</h2>
                                <form method="post" action="Controller?Controller=Usuario&Action=RegistraUsuarioController" id="formCadastrarse">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required="required">
                                        <?php
                                            if($erro_usuario)
                                                {
                                                echo '<font style="color:#FF0000">Usuario já cadastrado</font>';
                                                }
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
                                        <?php
                                            if($erro_email)
                                                {
                                                echo '<font style="color:#FF0000">Email já cadastrado</font>';
                                                }
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="required">
                                    </div>

                                    <button type="submit" class="btn form-control btn-custom1" id="btn_increva-se">Inscreva-se</button>
                                    <br><br>
                                </form>
                            </div>
                            
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4 borda3">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <h2>Já tenho uma conta</h2>
                                <form method="post" action="Controller?Controller=Usuario&Action=LoginUsuarioController" id="formLogin">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" required="required"/>
                                    </div>
                        
                                    <button type="buttom" class="btn form-control btn-custom1" id="btn_login">Entrar</button>
                                    <br /><br />                
                                </form>
                                <?php
                                    if($erro == 1)
                                        {   
                                        echo '<font color="#FF0000">Usuario e ou senha invalido(s)</font>';
                                        }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div>
		</div><br>

        <footer id="rodape">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <ul class="nav">
                            <li class="item-rede-social"><a href="#"><img src="imagens/facebook.png"></a></li>
                            <li class="item-rede-social"><a href="#"><img src="imagens/twitter.png"></a></li>
                            <li class="item-rede-social"><a href="#"><img src="imagens/instagram.png"></a></li>
                        </ul>
                    </div>
                </div> <!-- /row --><br><br>
            </div>
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>