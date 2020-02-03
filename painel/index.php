<?php 
	session_start();
	require_once('../config.php');
	include('fun.php');
	$con = new DBConnection();
	
	$id_usuario = $_SESSION['id2'];
	protege();
	
	$dados = $con->prepare("SELECT * FROM login WHERE id = ?");
	$dados->execute(array($id_usuario));
	while($row = $dados->fetch()){
		$nome_usuario = $row['nome'];
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>NoteSeries | Painel Administrativo</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/AdminLTE.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="../css/skin-blue.min.css">
	<link rel="stylesheet" href="../css/uploadfile.min.css">
	<script src="../js/dynamic.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
	
	  <header class="main-header"> <!-- HEADER MIN -->  
        <a href="index.html" class="logo" style="font-family: 'Kaushan Script', cursive;">
          <span class="logo-mini"><b>NO</b>SES</span>
          <span class="logo-lg"><b><i class="fa fa-film"></i> </b> noteSeries</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
			<!-- NOTIFICAÇÃO TOP NAV-->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Você tem X notificações</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> Mensagem da notificação 1
                        </a>
                      </li>
					  <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> Mensagem da notificação 2
                        </a>
                      </li>
					  <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> Mensagem da notificação 3
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Ver Todas</a></li>
                </ul>
              </li>
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">3</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Você tem X notificações</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> Mensagem da notificação 1
                        </a>
                      </li>
					  <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> Mensagem da notificação 2
                        </a>
                      </li>
					  <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> Mensagem da notificação 3
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Ver Todas</a></li>
                </ul>
              </li>
              
			  <!-- USUARIO TOP --> 
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="img/user8-128x128.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"> <?php echo $nome_usuario ?> </span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="img/user8-128x128.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $nome_usuario ?> - Web Developer
                      <small>Member desde Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Seguidores</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Mensagem</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Amigos</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href='?acao=true' class="btn btn-default btn-flat">Sair</a>
                    </div>
					<?php
					if(isset($_GET['acao']) && $_GET['acao'] == 'true'){
						session_unset();
						echo "<script>location.href='../login.php'</script>";
					}
					?>
	
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="img/user8-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $nome_usuario ?> </p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <ul class="sidebar-menu">
            <li class="header">Cadastrar</li>
				<li>
				  <a href="#" onclick="ldy('imdb/index.php','.conteudo')">
					<i class="fa fa-ticket"></i> <span>IMDB</span>
					<small class="label pull-right bg-red"><!-- 3 --></small>
				  </a>
				</li>
				<li>
				  <a href="#" onclick="ldy('add-serie.php','.conteudo')">
					<i class="fa fa-ticket"></i> <span>Nova Serie</span>
					<small class="label pull-right bg-red"><!-- 3 --></small>
				  </a>
				</li>
				<li>
				  <a href="#" onclick="ldy('add-categoria.php','.conteudo')">
					<i class="fa fa-book"></i> <span>Categoria</span>
					<small class="label pull-right bg-red"><!-- 3 --></small>
				  </a>
				</li>
				<li>
				  <a href="#" onclick="ldy('add-temporada.php','.conteudo')">
					<i class="fa fa-calendar"></i> <span>Temporada</span>
					<small class="label pull-right bg-red"><!-- 3 --></small>
				  </a>
				</li>	
				<li>
				  <a href="#" onclick="ldy('add-episodio.php','.conteudo')">
					<i class="fa fa-calendar"></i> <span>Episódios</span>
					<small class="label pull-right bg-red"><!-- 3 --></small>
				  </a>
				</li>	
			<li class="header">Consultar</li>
				<li>
				  <a href="#" onclick="ldy('all-series.php','.conteudo')">
					<i class="fa fa-ticket"></i> <span>Series</span>
					<small class="label pull-right bg-red">
					<?php
						$stat = $con->prepare("SELECT * FROM series");
						$stat->execute();
						$rows = $stat->fetchAll();
						$num_rows_series  = count($rows);
						echo $num_rows_series;
					?>
					</small>
				  </a>
				</li>
				<li>
				  <a href="#" onclick="ldy('all-categorias.php','.conteudo')">
					<i class="fa fa-book"></i> <span>Categoria</span>
				  </a>
				</li>
            <li class="header">Editar</li>
			<li><a href="#"><i class="fa fa-book"></i> <span>Botão</span></a></li>
            <li>
			   <a href="#">
			     <i class="fa fa-calendar"></i> <span>Botão</span>
				 <small class="label pull-right bg-red"><!-- 3 --></small>
			   </a>
			</li>
			<li class="treeview">
				  <a href="#">
					<i class="fa fa-share"></i> <span>Botão</span>
					<i class="fa fa-angle-left pull-right"></i>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-circle-o"></i> Sub Botão</a></li>
					<li><a href="#"><i class="fa fa-circle-o"></i> Sub Botão</a></li>
				  </ul>
				</li>
          </ul>
        </section>
      </aside>
<!-- 
==============================================================================================================================
==============================================================================================================================
==============================================================================================================================
==============================================================================================================================
-->

      <div class="conteudo content-wrapper">
	    <section class="content-header">
          <h1>
            Titulo
            <small>Sub-Titulo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Categoria</a></li>
            <li class="active">Titulo</li>
          </ol>
        </section>
		<section class="container-fluid" style="border-top:1px solid #ccc; margin-top:5px; margin-right:15px; margin-left:15px; padding:0px;">
		  teste
	    </section>
      </div>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versão</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> Todos direitos reservados.
      </footer>

    </div>
	
	<div id="loading" class="hidden-print" style="width:40px;height:40px;border:1px solid #CCC;padding:10px;left:50%;margin-left:-25px;display:none;position:fixed;top:20%;background:#333;border-radius:3px;z-index:9999;">
		<img src="../img/loading2.gif" alt="" width="20px" />
	</div>
	
	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="../js/app.min.js"></script>
	<script src="../js/jquery.maskedinput.js"></script>
	<script src="../js/jquery.uploadfile.min.js"></script>
	<script>
		$( document ).ajaxStart(function() {
			$('#loading').show();
		});

		$( document ).ajaxStop(function() {
			$('#loading').hide();
		});


		function ldy(caminho,div) {

			$("#load").fadeIn();

			$.ajax({url:caminho,success:function(result){
			$(div).html(result);
			$("#load").fadeOut();
		}});

		}


		function post(form,url,retorno) {


			  var dados = jQuery( form ).serialize();
			  

			  jQuery.post(url,dados,function(data){

				$(retorno).html(data);
				$("#load").fadeOut();

			  })



		}
		
		function posti(form,urli,retorno) {

				var dados = jQuery( form ).serialize();
				
				jQuery.ajax({
		
					type: "POST",
					url: urli,
					data: dados,
					success: function( data )
					{
						$(retorno).html(data);
		
					}
				});
				
				
				return false;
			}
	</script>
  </body>
</html>
