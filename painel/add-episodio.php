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
if($tc=='ok'){
	$stat2 = $con->prepare("SELECT * FROM temporadas WHERE id_serie = ?");
	$stat2->execute(array($temporada_controle));
	while($row2 = $stat2->fetch())
	{
		echo '<option value="'.$row2['id_temp'].'">Temporada '.$row2['temporada'].'</option>';
	} 
	exit;
}
if($ac=='inserir'){
	try{ 
		$stmt = $con->prepare('SELECT * FROM episodios WHERE id_serie=? and id_temp=? and num_ep=?');
		$stmt->bindParam(1, $id_serie, PDO::PARAM_INT);
		$stmt->bindParam(2, $temporada, PDO::PARAM_INT);
		$stmt->bindParam(3, $num_ep, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(!$row)
		{
			$stmt = $con->prepare("INSERT INTO `episodios` (id_temp,num_ep,nome,descricao_ep,id_serie) VALUES (?,?,?,?,?)"); 
			$stmt ->execute(array($temporada,$num_ep,$nome,$descricao_ep,$id_serie)); 
			echo '<div class="alert alert-success" style="margin:20px;">
				<strong>Sucesso!</strong> Episodio foi cadastrada com sucesso!!!
			  </div>';
		}else{
			echo '<div class="alert alert-danger" style="margin:20px;">
				<strong>Erro!</strong> Episodio ja foi cadastrada!!!
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
            Cadastro de Episodio
            <small>Insira um novo episodio</small>
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
	<form action="javascript:void(0)" class="form-inline" onSubmit="post(this,'add-episodio.php?ac=inserir','.resultado');" class="hidden-print">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<label style="width:100%; padding-bottom:5px;">
				<select name="id_serie" onChange="$('#itens-temporada').load('add-episodio.php?tc=ok&temporada_controle=' + $(this).val() + '');" class="form-control input-sm" style="width:100%; height:50px;" required>
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
				<select name="temporada" class="form-control input-sm" style="width:100%; height:50px;" id="itens-temporada" required>
					<option value="" disabled selected>Selecione uma temporada</option>
				</select>
			</label>
			<div class="col-xs-12 col-sm-6 col-md-6">
				<label style="width:100%; padding-bottom:5px;">
					<input name="num_ep" type="text" onClick="$(this).select();" style="width:100%; height:50px"  placeholder="Numero do Episodio" class="form-control input-sm" required/>
				</label>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6">
				<label style="width:100%; padding-bottom:5px;">
					<input name="nome" type="text" onClick="$(this).select();" style="width:100%; height:50px"  placeholder="Titulo do Episodio" class="form-control input-sm" required/>
				</label>
			</div>
			<label style="width:100%; padding-bottom:5px;">
				<textarea name="descricao_ep" onClick="$(this).select();" style="width:100%; height:150px" placeholder="Descrição do Episodio" class="form-control input-sm" required></textarea> 
			</label>
			
			<center><input type="submit" value="Cadastrar" style="width:45%; height:40px; margin-top:20px;" class="btn btn-sm btn-success" /></center>
		</div>
	</form>
</section>