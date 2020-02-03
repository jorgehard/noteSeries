<?php
	session_start();
	require_once('../../config.php');
	include('../fun.php');
	$con = new DBConnection();
	protege(); 
	date_default_timezone_set('America/Sao_Paulo');
	$today = getdate(); 
	if($today['mon'] < 10) { 
		$today['mon'] = '0'.$today['mon'];
	} else { 
		$today['mon'] = $today['mon'];
	} 
	if($today['mday'] < 10){ 
		$today['mday'] = '0'.$today['mday']; 
	}else{ 
		$today['mday'] = $today['mday']; 
	}  
	$todayTotal = $today['year'].'-'.$today['mon'].'-'.$today['mday'];
	$inicioMes = $today['year'].'-'.$today['mon'].'-01';
?>

<section class="content-header" style="border-bottom:1px solid #ccc">
          <h1 style="font-family: 'Oswald', sans-serif;letter-spacing:4px; padding-bottom:10px;">
            Pesquisar Seriados
            <small>Pesquisar pelo seriado desejado</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cadastrar</a></li>
            <li class="active">IMDB</li>
          </ol>
</section>
<!-------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------->
<section class="container-fluid" style="padding-top:10px" id="return-fail">
	<form action="javascript:void(0)" class="form-inline" onSubmit="post(this,'imdb/search.php?searchtype=movie','.resultado');" class="hidden-print">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<center>
			<input type="text" name="name" style="width:50%; height:30px; margin-top:20px;" class="form-control input-sm" placeholder="Nome da Serie" maxlength="50" required/>
			<input type="submit" value="Pesquisar" style="width:50%; height:30px; margin-top:20px;" class="btn btn-sm btn-success" />
			</center>
		</div>
	</form>
</section>

<div class="resultado"></div>