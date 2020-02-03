<?php
	session_start();
	require_once('../config.php');
	include('fun.php');
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
<?php 
if($ac=='inserir'){
	try{ 
		$stmt = $con->prepare('SELECT * FROM temporadas WHERE id_serie=? and temporada=?');
		$stmt->bindParam(1, $id_serie, PDO::PARAM_INT);
		$stmt->bindParam(2, $temporada, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(!$row)
		{
			$stmt = $con->prepare("INSERT INTO `temporadas` (id_serie,temporada) VALUES (?,?)"); 
			$stmt ->execute(array($id_serie, $temporada)); 
			echo '<div class="alert alert-success" style="margin:20px;">
				<strong>Sucesso!</strong> Temporada foi cadastrada com sucesso!!!
			  </div>';
		}else{
			echo '<div class="alert alert-danger" style="margin:20px;">
				<strong>Erro!</strong> Temporada ja foi cadastrada!!!
			  </div>';
		}
	}
	catch(PDOException $i)
	{
		echo '<div class="alert alert-danger">
				<strong>Error: </strong>'. $i->getMessage() .'
			  </div>';
	}
	exit;
}
?>
<section class="content-header" style="border-bottom:1px solid #ccc">
          <h1 style="font-family: 'Oswald', sans-serif;letter-spacing:4px; padding-bottom:10px;">
            Cadastro de Temporadas
            <small>Insira uma nova temporada</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cadastrar</a></li>
            <li class="active">Temporada</li>
          </ol>
</section>
<!-------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------->
<div class="resultado"></div>
<section class="container-fluid" style="padding-top:10px" id="return-fail">
	<form action="javascript:void(0)" class="form-inline" onSubmit="post(this,'add-temporada.php?ac=inserir','.resultado');" class="hidden-print">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<label style="width:100%; padding-bottom:5px;">
				<select name="id_serie" class="form-control input-sm" style="height:50px;" required>
					<option value="">Selecione uma serie</option>
					<?php

						$stat2 = $con->prepare("SELECT * FROM series ORDER BY titulo");
						$stat2->execute();
						while($row2 = $stat2->fetch())
						{
							echo '<option value="'.$row2['id'].'">'.$row2['id'].' - '.$row2['titulo'].'</option>';
						} 
					?>
				</select>
			</label>
			<label style="width:100%; padding-bottom:5px;">
				<select name="temporada" class="form-control input-sm" style="height:50px;" required>
					<option value="">Selecione uma temporada</option>
					<?php
						for($i = 1; $i <= 20; $i++){
							echo '<option value="'.$i.'">Temporada '.$i.'</option>';
						}							
					?>
				</select>
			</label>
			<center><input type="submit" value="Cadastrar" style="width:45%; height:40px; margin-top:20px;" class="btn btn-sm btn-success" /></center>
		</div>
	</form>
</section>