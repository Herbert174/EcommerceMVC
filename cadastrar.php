<?php

	session_start();

	include_once "Framework/Controller/EcommerceController.php";
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

    <title>Cadastro de produto</title>

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
    	<div class="page-header">
        	<h1>Cadastrar Produto</h1>
      	</div>

      	<div class="row"><!-- Row onde ficará o form que será enviado para o banco de dados -->
      		<form enctype="multipart/form-data" method="POST" action="Controller?Controller=Produto&Action=CadastrarProdutoController">
        	<div class="col-sm-7">
        		<div class="form-group">
	        		<label>
						Nome do produto:<br> <input type="text" name="nome_produto" class="form-control" maxlength="20">
					</label><br>
				</div>
				<div class="form-group">
					<label>
						Imagem:<br>
					</label>
						<input type="hidden" name="MAX_FILE_SIZE" value="99999999"/><!-- Tamanho max. permitido -->
						<input type="file" name="imagem" class="form-control formulario_custom1"/><!-- Ferramenta de busca necessária para selecionar imagem -->
					<br>
				</div>
				<div class="form-group">
					<label>
						Resumo:<br>
						<textarea id="resumo" name="resumo" rows="3" cols="40">Coloque aqui uma descrição do produto.</textarea>
					</label><br>
				</div>
				<div class="form-group">
					<label>
						Informações técnicas:<br>
						<textarea id="info_tec" name="info_tec" rows="3" cols="40">Coloque aqui as informações técnicas do produto.</textarea>
					</label>
				</div>
				<div class="form-group">
					<label>
						Garantia:<br>
						<textarea id="garantia" name="garantia" rows="3" cols="40">Informações sobre a garantia do produto.</textarea>
					</label>
				</div>
				<div class="form-group">
					<label>
						Embalagem:<br>
						<textarea id="embalagem" name="embalagem" rows="3" cols="40">Informações sobre o conteudo da embalagem do produto.</textarea>
					</label>
				</div>
				
        	</div>

        	<div class="col-sm-5">
        		<div class="form-group">
	        		<label>
						Quantidade em estoque(un):<br> <input type="text" name="qntd_estoque" value="0" class="form-control">
					</label><br>
				</div>
				<div class="form-group">
					<label>
						Preço(R$):<br> <input type="text" name="preco" value="0.00" class="form-control">
					</label><br>
				</div>
				<div class="form-group">
					<label>
						Cumprimento(cm):<br> <input type="text" name="cumprimento" value="0" class="form-control">
					</label><br>
				</div>
				<div class="form-group">
					<label>
						Altura(cm):<br> <input type="text" name="altura" value="0" class="form-control">
					</label><br>
				</div>
				<div class="form-group">
					<label>
						Largura(cm):<br> <input type="text" name="largura" value="0" class="form-control"><br>
					</label>
				</div>
				<div class="form-group">
					<label>
						Peso(g):<br> <input type="text" name="peso" value="0" class="form-control">
					</label><br>
				</div>
				<div class="form-group">
					<label>Seção:</label><br>
					<select class="form-control formulario_custom1" name="secao">
		                <option value="1">Computadores</option>
		                <option value="2">Notebooks</option>
		                <option value="3">Celulares</option>
		                <option value="4">Fones</option>
		                <option value="5">Carregadores</option>
		                <option value="6">Calçados</option>
	            	</select>
	            </div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Cadastrar"><!-- Botão de envio -->
				</div>
        	</div>
        	</form>	
		</div>
	</section>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>