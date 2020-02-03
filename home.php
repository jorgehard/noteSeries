<?php
	require_once('config.php');
	require_once('functions.php');
	$con = new DBConnection();
	verificaLogin();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>NoteSeries - Acompanhe suas series preferidas</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" type="text/css"/>
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css"/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Oswald|Ubuntu:500|Lobster" type="text/css"/>
		<link rel="stylesheet" href="css/all-style.css?v=0.6.9" type="text/css"/>
		<link rel="stylesheet" href="css/all-modal-serie.css?v=0.6.8" type="text/css"/>
	</head>
	<body>
	<?php 
	if(@$ac=='localizar'){
			$search = '%'.$search.'%';
				$stat = $con->prepare("SELECT * FROM series WHERE titulo LIKE ? LIMIT 300");
				$stat->execute(array($search));
				while($row = $stat->fetch())
				{
				echo '	<div class="col-xs-6 col-md-2-5 col-sm-3">
							<img src="'.$row['img'].'" class="img-responsive" width="100%" alt="Responsive image" style="position:relative; top:0px">
							<div class="box-series-background">
								<div id="buttons-box-series">
									<a href="#" title="Favoritos" id="button-fav">
										<i class="fa fa-heart-o"></i>
									</a>
								</div>
							
								<div class="box-click-fix" onClick="$(\'.modal-body\').load(\'serie.php?id='.$row['id'].'\')"  data-toggle="modal" data-target="#myModal2"></div>
								
								<div id="title-box-series">
									<a href="#" onclick="ldy(\'serie.php?id='.$row['id'].'\',\'.conteudo\')" title="Favoritos" id="button-fav">
										'.$row['titulo'].'
									</a>
								</div>
							</div>
						</div>	';
				}
			exit;
	  }

	  ?>
		<div class="container-fluid top-nick-bar">
			<span class="title-top">
				<span class="glyphicon glyphicon-film" aria-hidden="true"></span> NoteSeries
			</span>
		</div>
		<nav class="navbar-top-1">
			<div class="container-fluid">
				<div class="col-md-3 col-sm-3 col-xs-12 buttons-top-xs">
					<ul>
						<li><a href="home.php" title="Home"><i class="fa fa-home"></i></a></li>
						<li><a href="#" title="Mais Vistas"><i class="fa fa-globe"></i></a></li>
						<li><a href="#" title="Favoritos"><i class="fa fa-heart"></i></a></li>
						<li><a href="#" title="Comentarios"><i class="fa fa-comments"></i></a></li>
						<li><a href="#" title="Configuracoes"><i class="fa fa-cog"></i></a></li>
						<li><a href="#" title="Denunciar"><i class="fa fa-flag"></i></a></li>
					</ul>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<fieldset class="search-nav-top">
						<form action="javascript:void(0)" class="form-inline" onSubmit="post(this,'home.php?ac=localizar','.conteudo');" id="searchForm" class="hidden-print">
							<div class="col-md-11 col-xs-10 resetMargin">
								<input type="search" name="search" placepageId="Procure pelo oque deseja..."/>
							</div>
							<div class="col-md-1 col-xs-2 resetMargin">
								<button type="submit" form="searchForm" value=""><span class="glyphicon glyphicon-search"></span></button>
							</div>
						</form>
					</fieldset>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12 button-login-xs">
					<ul class="pull-right">
						<li>
							<?php 
								if($status){ 
									echo '<a href="#" title="User"> <i class="fa fa-user"></i> <span class="button-login">'.$_SESSION['nome_usuario'].'</span> </a>';
								}else{ 
									echo '<a href="login.php" title="User"> <i class="fa fa-user"></i> <span class="button-login">Entrar</span> </a>'; 
								} 
							?>
						</li>
						<li>
							<?php 
								if($status){ 
									echo '<a href="logout.php?acao=true" title ="Exit"><i class="fa fa-sign-out"></i><span class="button-login">Sair</span></a>';
								}
							?>
						</li>
					</ul>
				</div>
			</div>
		</nav> 
		<div class="row" style="margin:0px;">
			<div class="conteudo row">
				<section id="itemContainer">
					<?php
					$stat = $con->prepare("SELECT * FROM series ORDER BY rating DESC LIMIT 300");
					$stat->execute();
					while($row = $stat->fetch())
					{
					?>
					<div class="col-xs-6 col-md-2-5 col-sm-3">
						<img src="<?php echo $row['img']; ?>" class="img-responsive" width="100%" alt="Responsive image" style="position:relative; top:0px">
						<div class="box-series-background">
							<div id="buttons-box-series">
								<a href="#" title="Favoritos" id="button-fav">
									<i class="fa fa-heart-o"></i>
								</a>
							</div>
								
							<div class="box-click-fix" onClick="$('.modal-body').load('serie.php?id=<?php echo $row['id'];?>')"  data-toggle="modal" data-target="#myModal2"></div>
									
							<div id="title-box-series">
								<a href="#" onclick="ldy('serie.php?id=<?php echo $row['id'];?>','.conteudo')" title="Favoritos" id="button-fav">
									<?php echo $row['titulo']; ?>
								</a>
							</div>
						</div>
					</div>	
					<?php } ?>
				</section>
			</div>
			<div id="pageId"></div>
		</div>
		<div id="loading">
			<img src="img/loading.gif" alt="" width="120px"/>
		</div>
		<div class="modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-principal">
				<div class="modal-content">
					<div class="modal-body">
						Aguarde um momento &nbsp;&nbsp; 
						<img src="../../imagens/loading.gif" alt="Carregando" width="15px"/>
					</div>
				</div>
			</div>
		</div>
		<!--------------------------------- SCRIPTS --------------------------------->
		<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="js/geral.js"></script>
		<script src="js/jPages.min.js"></script>
		<script>
		 $(function(){
		$("#pageId").jPages({
				containerID  : "itemContainer",
				previous     : "← ",
				next     : "→ ",
				perPage      : 32,
				startPage    : 1,
				startRange   : 1,
				midRange     : 5,
				endRange     : 1,
				animation    :  "none",
				jqueryanimation:"none"
			});
		});
		</script>
	</body>
</html>