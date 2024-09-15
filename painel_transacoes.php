<?php 
 
    session_start();

    include_once "Framework/Controller/EcommerceController.php";
    
    $Transacao = new TransacaoController();
	
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

        <script type="text/javascript">

            function cancelar(id)
                {
                var confirmacao = confirm("Tem certeza que deseja cancelar esta transação?");
                if(confirmacao == true)
                    {
                    //alert('O cancelamento foi solicitado com sucesso!');
                    $.ajax({
                            url: 'cancelar_transacao?id='+id,
                            success: function(data)
                                {
                                alert('O cancelamento foi solicitado com sucesso!');
                                }
                          });
                    }
                }
                
        </script>
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
            <a href="crud"><i class="fas fa-desktop"></i><span>Inicio Painel</span></a>
            <a href="painel_transacoes"><i class="fas fa-table"></i><span>Dashboard de transações</span></a>
            <a href="editar_slide"><i class="fas fa-th"></i><span>Produtos em destaque</span></a>
            <a href="cadastrar"><i class="fas fa-info-circle"></i><span>Cadastrar produto</span></a>
            <a href="index"><i class="fas fa-sliders-h"></i><span>Sair do painel</span></a>
        </div>
        <!-- Sidebar end -->

        <div class="modal fade" id="modal-endereco">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    <h4 class="modal-title">Endereço de entrega</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div id="endereco">
                            </div>
                        </div>
                    </div>                                             
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
        </div>

		<div class="modal fade" id="modal-produtos">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    <h4 class="modal-title">Lista de produtos</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div id="produtos">
                            </div>
                        </div>
                    </div>                                             
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
        </div>

        <section class="content">
	    	<div class="page-header">
	        	<h1>Compras realizadas</h1>
	      	</div>

		    <div class="row">
		    	<div class="col-sm-12">
					<table class="table table-hover">
						<thead class="tabela_custom">
							<tr>
								<th class="centro1" scope="col">Codigo de Referência</th>
								<th class="centro1" scope="col">Comprador</th>
								<th class="centro1" scope="col">Valor da compra</th>
								<th class="centro1" scope="col">Status de pagamento</th>
                                <th class="centro1" scope="col">Endereço</th>
								<th class="centro1" scope="col">Produtos</th>
                                <th class="centro1" scope="col">Codigo de Transação</th>
							</tr>
						</thead>
						<tbody><!-- Area onde é exibido os produtos já cadastrados no banco de dados -->
						    <?php echo $Transacao->ExibirAllTransacoesController(); ?>
						</tbody>
					</table>
				</div>
			</div>
        </section>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.btn_endereco').click( function()
                    {
                    var id = $(this).data('codigoreferencia');
                    $.ajax({
                            url: 'Controller',
                            method: 'get',
                            data: {CodigoReferencia: id,
                                Controller: 'Transacao',
                                Action: 'ExibirEnderecoEntregaTransacaoController',
                            },
                            success: function(data)
                                {
                                $('#endereco').html(data);
                                $('#modal-endereco').modal();
                                }
                        });
                    });

                $('.btn_produtos').click( function()
                    {
                    var id = $(this).data('codigoreferencia');
                    $.ajax({
                            url: 'Controller',
                            method: 'get',
                            data: {CodigoReferencia: id,
                                Controller: 'Transacao',
                                Action: 'ExibirProdutosTransacaoControler',
                            },
                            success: function(data)
                                {
                                $('#produtos').html(data);
                                $('#modal-produtos').modal();
                                }
                        });
                    });
            });
        </script>
	</body>
</html>