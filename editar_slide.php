<?php

	session_start();

	include_once "Framework/Controller/EcommerceController.php";
		
	$Produto = new ProdutoController();
	$retorno = $Produto->RecuperarProdutosDestaquesController();
	$dados_destaques = $retorno[1];
	$dados_destaque = $retorno[0];

	$Usuario = new UsuarioController();

	if($Usuario->VerificarAcessoAdmController())
		{
		
		}else
			{
			header("Location: index");
			}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Editando destaques</title>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

		<!-- CSS -->
	    <link rel="stylesheet" href="estilogerenciamento.css">

        <!-- Jquery -->
        <script src="jquery-3.6.0.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" charset="utf-8"></script>

    <style type="text/css">
    	body {background-image: none;}
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  	<input type="checkbox" id="check">
	<!-- Header area start -->
	<header>
		<label for="check">
			<i class="fas fa-bars" id="sidebar_btn"></i>
		</label>
		<div class="left_area">
			<h3><span>Painel</span> de controle</h3>
		</div>
	</header>
	<!-- Header area end -->

	<!-- Mobile navigation bar start -->
	<div class="mobile_nav">
		<div class="nav_bar">
			<h4 class="nomeUsuarioColapse">Usuario</h4>
			<i class="fa fa-bars nav_btn"></i>
		</div>
		<div class="mobile_nav_items">
			<a href="#"><i class="fas fa-desktop"></i><span>Inicio Painel</span></a>
			<a href="painel_transacoes"><i class="fas fa-table"></i><span>Dashboard de transações</span></a>
			<a href="editar_slide"><i class="fas fa-th"></i><span>Produtos em destaque</span></a>
			<a href="cadastrar"><i class="fas fa-info-circle"></i><span>Cadastrar produto</span></a>
			<a href="painel_comentarios"><i class="fas fa-info-circle"></i><span>Comentarios</span></a>
			<a href="index"><i class="fas fa-sliders-h"></i><span>Sair do painel</span></a>
		</div>
	</div>
	<!-- Mobile navigation bar end -->

	<!-- Sidebar start -->
	<div class="sidebar">
		<div class="profile_info">
			<h4>Usuario</h4>
		</div>
		<a href="crud"><i class="fas fa-desktop"></i><span>Inicio Painel</span></a>
		<a href="painel_transacoes"><i class="fas fa-table"></i><span>Dashboard de transações</span></a>
		<a href="editar_slide"><i class="fas fa-th"></i><span>Produtos em destaque</span></a>
		<a href="cadastrar"><i class="fas fa-info-circle"></i><span>Cadastrar produto</span></a>
		<a href="painel_comentarios"><i class="fas fa-info-circle"></i><span>Comentarios</span></a>
		<a href="index"><i class="fas fa-sliders-h"></i><span>Sair do painel</span></a>
	</div>
	<!-- Sidebar end -->
    

    <section class="content">
      	<div class="row">
		  	<div class="col-sm-5 borda3">
			  	<h3 class="centro1">Editar produtos Destaques</h3>
				<div class="col-sm-6">
				<form method="POST" enctype="multipart/form-data" action="crud?Controller=Produto&Action=AtualizarProdutosDestaqueController&id_produto=1">
					<div class="form-group">
						<label>
							Destaque 1:<br> <input type="text" name="destaque1" value="<?= $dados_destaques[0]['destaque1']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Destaque 2:<br> <input type="text" name="destaque2" value="<?= $dados_destaques[0]['destaque2']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Destaque 3:<br> <input type="text" name="destaque3" value="<?= $dados_destaques[0]['destaque3']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Destaque 4:<br> <input type="text" name="destaque4" value="<?= $dados_destaques[0]['destaque4']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<input type="submit" value="Atualizar" class="btn btn-primary">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Destaque 5:<br> <input type="text" name="destaque5" value="<?= $dados_destaques[0]['destaque5']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Destaque 6:<br> <input type="text" name="destaque6" value="<?= $dados_destaques[0]['destaque6']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Destaque 7:<br> <input type="text" name="destaque7" value="<?= $dados_destaques[0]['destaque7']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Destaque 8:<br> <input type="text" name="destaque8" value="<?= $dados_destaques[0]['destaque8']; ?>" class="form-control">
						</label><br>
					</div>
				</form>
				</div>
			</div>

			<div class="col-sm-1"></div>

        	<div class="col-sm-5 borda3">
			<h3 class="centro1">Editar produtos Mais vendidos</h3>
				<form method="POST" enctype="multipart/form-data" action="crud?Controller=Produto&Action=AtualizarProdutosDestaqueController&id_produto=2">
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Mais vendidos 1:<br> <input type="text" name="destaque1" value="<?= $dados_destaques[1]['destaque1']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais vendidos 2:<br> <input type="text" name="destaque2" value="<?= $dados_destaques[1]['destaque2']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais vendidos 3:<br> <input type="text" name="destaque3" value="<?= $dados_destaques[1]['destaque3']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais vendidos 4:<br> <input type="text" name="destaque4" value="<?= $dados_destaques[1]['destaque4']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<input type="submit" value="Atualizar" class="btn btn-primary">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Mais vendidos 5:<br> <input type="text" name="destaque5" value="<?= $dados_destaques[1]['destaque5']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais vendidos 6:<br> <input type="text" name="destaque6" value="<?= $dados_destaques[1]['destaque6']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais vendidos 7:<br> <input type="text" name="destaque7" value="<?= $dados_destaques[1]['destaque7']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais vendidos 8:<br> <input type="text" name="destaque8" value="<?= $dados_destaques[1]['destaque8']; ?>" class="form-control">
						</label><br>
					</div>
				</div>
				</form>
			</div>
		</div><br>

      	<div class="row">
		  	<div class="col-sm-5 borda3">
			  <h3 class="centro1">Editar produtos Mais procurados</h3>
				<form method="POST" enctype="multipart/form-data" action="crud?Controller=Produto&Action=AtualizarProdutosDestaqueController&id_produto=3">
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Mais procurados 1:<br> <input type="text" name="destaque1" value="<?= $dados_destaques[2]['destaque1']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais procurados 2:<br> <input type="text" name="destaque2" value="<?= $dados_destaques[2]['destaque2']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais procurados 3:<br> <input type="text" name="destaque3" value="<?= $dados_destaques[2]['destaque3']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais procurados 4:<br> <input type="text" name="destaque4" value="<?= $dados_destaques[2]['destaque4']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<input type="submit" value="Atualizar" class="btn btn-primary">
					</div>
				</div>
			
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Mais procurados 5:<br> <input type="text" name="destaque5" value="<?= $dados_destaques[2]['destaque5']; ?>" class="form-control">
						</label><br>
						</div>
					<div class="form-group">
						<label>
							Mais procurados 6:<br> <input type="text" name="destaque6" value="<?= $dados_destaques[2]['destaque6']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais procurados 7:<br> <input type="text" name="destaque7" value="<?= $dados_destaques[2]['destaque7']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Mais procurados 8:<br> <input type="text" name="destaque8" value="<?= $dados_destaques[2]['destaque8']; ?>" class="form-control">
						</label><br>
					</div>
				</div>
				</form>
			</div>
			<div class="col-sm-1"></div>

		  	<div class="col-sm-5 borda3">
				<h3 class="centro1">Editar produtos Slide</h3>
				<div class="col-sm-6">
				<form method="POST" enctype="multipart/form-data" action="crud?Controller=Produto&Action=AtualizarProdutosSlideController&id_produto=1">
					<div class="form-group">
						<label>
							Mais vendido:<br> <input type="text" name="mais_vendido" value="<?= $dados_destaque[0]['mais_vendido']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Destaque:<br> <input type="text" name="destaque" value="<?= $dados_destaque[0]['destaque']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<input type="submit" value="Atualizar" class="btn btn-primary">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Novidade 1:<br> <input type="text" name="novidade1" value="<?= $dados_destaque[0]['novidade1']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Novidade 2:<br> <input type="text" name="novidade2" value="<?= $dados_destaque[0]['novidade2']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Novidade 3:<br> <input type="text" name="novidade3" value="<?= $dados_destaque[0]['novidade3']; ?>" class="form-control">
						</label><br>
					</div>
				</div>
				</form>
			</div>
		</div><br>

      	<div class="row">
		  	<div class="col-sm-5 borda3">
			  <h3 class="centro1">Editar produtos Aba 1</h3>
				<form method="POST" enctype="multipart/form-data" action="crud?Controller=Produto&Action=AtualizarProdutosSlideController&id_produto=2">
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Produto Aba 1:<br> <input type="text" name="novidade1" value="<?= $dados_destaque[1]['novidade1']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Produto Aba 2:<br> <input type="text" name="novidade2" value="<?= $dados_destaque[1]['novidade2']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<input type="submit" value="Atualizar" class="btn btn-primary">
					</div>
				</div>
			
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Produto Aba 3:<br> <input type="text" name="novidade3" value="<?= $dados_destaque[1]['novidade3']; ?>" class="form-control">
						</label><br>
						</div>
					<div class="form-group">
						<label>
							Produto Aba 4:<br> <input type="text" name="mais_vendido" value="<?= $dados_destaque[1]['mais_vendido']; ?>" class="form-control">
						</label><br>
					</div>
				</div>
				</form>
			</div>
			<div class="col-sm-1"></div>
			
		  	<div class="col-sm-5 borda3">
				<h3 class="centro1">Editar produtos Aba 2</h3>
				<div class="col-sm-6">
				<form method="POST" enctype="multipart/form-data" action="crud?Controller=Produto&Action=AtualizarProdutosSlideController&id_produto=3">
					<div class="form-group">
						<label>
							Produto Aba 1:<br> <input type="text" name="novidade1" value="<?= $dados_destaque[2]['novidade1']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Produto Aba 2:<br> <input type="text" name="novidade2" value="<?= $dados_destaque[2]['novidade2']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<input type="submit" value="Atualizar" class="btn btn-primary">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Produto Aba 3:<br> <input type="text" name="novidade3" value="<?= $dados_destaque[2]['novidade3']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Produto Aba 4:<br> <input type="text" name="mais_vendido" value="<?= $dados_destaque[2]['mais_vendido']; ?>" class="form-control">
						</label><br>
					</div>
				</div>
				</form>
			</div>
		</div><br>

      	<div class="row">
		  	<div class="col-sm-5 borda3">
			    <h3 class="centro1">Editar produtos Aba 3</h3>
				<form method="POST" enctype="multipart/form-data" action="crud?Controller=Produto&Action=AtualizarProdutosSlideController&id_produto=4">
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Produto Aba 1:<br> <input type="text" name="novidade1" value="<?= $dados_destaque[3]['novidade1']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Produto Aba 2:<br> <input type="text" name="novidade2" value="<?= $dados_destaque[3]['novidade2']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<input type="submit" value="Atualizar" class="btn btn-primary">
					</div>
				</div>
			
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Produto Aba 3:<br> <input type="text" name="novidade3" value="<?= $dados_destaque[3]['novidade3']; ?>" class="form-control">
						</label><br>
						</div>
					<div class="form-group">
						<label>
							Produto Aba 4:<br> <input type="text" name="mais_vendido" value="<?= $dados_destaque[3]['mais_vendido']; ?>" class="form-control">
						</label><br>
					</div>
				</div>
				</form>
			</div>
			<div class="col-sm-1"></div>

			<div class="col-sm-5 borda3">
			    <h3 class="centro1">Editar principais categorias</h3>
				<form method="POST" enctype="multipart/form-data" action="crud?Controller=Produto&Action=AtualizarProdutosSlideController&id_produto=5">
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Categoria 1:<br> <input type="text" name="novidade1" value="<?= $dados_destaque[4]['novidade1']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<label>
							Categoria 2:<br> <input type="text" name="novidade2" value="<?= $dados_destaque[4]['novidade2']; ?>" class="form-control">
						</label><br>
					</div>
					<div class="form-group">
						<input type="submit" value="Atualizar" class="btn btn-primary">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>
							Categoria 3:<br> <input type="text" name="novidade3" value="<?= $dados_destaque[4]['novidade3']; ?>" class="form-control">
						</label><br>
					</div><br>
				</div>
				</form>
			</div>
		</div><br>
	</section>
  </body>
</html>