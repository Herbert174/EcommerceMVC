<?php 
 
	include_once "Framework/Controller/EcommerceController.php";
		
	$Produto = new ProdutoController();

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
        }
	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Crud</title>
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
                <a href="index"><i class="fas fa-sliders-h"></i><span>Sair do painel</span></a>
            </div>
        </div>
        <!-- Mobile navigation bar end -->

        <!-- Sidebar start -->
        <div class="sidebar">
            <div class="profile_info">
                <h4>Usuario</h4>
            </div>
            <a href="#"><i class="fas fa-desktop"></i><span>Inicio Painel</span></a>
            <a href="painel_transacoes"><i class="fas fa-table"></i><span>Dashboard de transações</span></a>
            <a href="editar_slide"><i class="fas fa-th"></i><span>Produtos em destaque</span></a>
            <a href="cadastrar"><i class="fas fa-info-circle"></i><span>Cadastrar produto</span></a>
            <a href="index"><i class="fas fa-sliders-h"></i><span>Sair do painel</span></a>
        </div>
        <!-- Sidebar end -->


		<section class="content">
			<div class="page-header">
				<h1>Listagem de produtos</h1>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<table class="table table-hover">
						<thead class="tabela_custom">
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Imagem</th>
								<th scope="col">Nome produto</th>
								<th scope="col">Preço</th>
								<th scope="col">Ações</th>
							</tr>
						</thead>
						<tbody><!-- Area onde é exibido os produtos já cadastrados no banco de dados -->
							<?php echo $Produto->ExibirTodosProdutoController() ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>

		<script type="text/javascript">
			$(document).ready(function()
				{
				$('.btn_apagar').click( function()
					{
					var id_produto = $(this).data('id_produto');
					var Controller = 'Produto';
					var Action = 'ExcluirProdutoController';

					if(confirm('Esta ação apagará o produto em definitivo!'))
						{
						$.ajax({
							url: 'crud.php',
							method: 'get',
							data: {id_produto: id_produto,
								Controller: Controller,
								Action: Action,
							},
							success: function(data)
								{
								}
							})
						}
					});
				});
		</script>
	</body>
</html>