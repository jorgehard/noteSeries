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
if($ac=='localizar'){
	echo '<table width="100%" class="table table-striped table-condensed table-bordered small">
		<thead><tr class="small"><th>Foto</th><th>Titulo</th><th>Descrição</th><th>Ano</th><th>Duração</th><th>Categoria</th><th>Editar</th></tr></thead>
		<tbody>';
		$stat = $con->prepare("SELECT * FROM series");
		$stat->execute();
		while($row = $stat->fetch())
		{
		echo '<tr>';
		echo '<td><img src="'.$row['img'].'" class="img-responsive" alt="Responsive image">';
		echo '<td width="10%">'.$row['titulo'].'</td>';
		echo '<td>'.$row['descricao'].'</td>';
		echo '<td>'.$row['ano'].'</td>';
		echo '<td>'.$row['duracao'].'min</td>';
		$cat = $con->prepare("SELECT descricao FROM categorias WHERE id_categoria = ?");
		$cat->execute(array($row['id_categoria']));
		$nome_cat = $cat->fetch();
		echo '<td>'.$nome_cat['descricao'].'</td>';
		echo '<td>Edit</td>';
		echo '</tr>';
		} 
		echo '</tbody></table>';
	exit;
	} 
	?>
<section class="content-header" style="border-bottom:1px solid #ccc; margin:0px 20px 5px 20px;">
          <h1 style="font-family: 'Oswald', sans-serif;letter-spacing:4px; padding-bottom:10px;">
            Consulta de Series
            <small>Consulte por uma serie, edite e salve alterações!</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Consultar</a></li>
            <li class="active">Series</li>
          </ol>
</section>
<!-------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------->
<section class="container-fluid" style="padding:10px 0px 5px 0px;">
		<form action="javascript:void(0)" class="form-inline" onSubmit="post(this,'all-series.php?ac=localizar','.resultado');" class="hidden-print">
			<label class="col-md-7"><small>Buscar:</small>
				<input type="text" name="busca" placeholder="Digite o nome de uma serie, Ex: Supernatural" class="form-control input-sm" style="border-radius:3px; width:100%">
			</label>
			<label class="col-md-1"><small>Ano: </small>
				<input type="text" name="ano" class="form-control input-sm"  placeholder="Ex:2015" style="border-radius:3px; width:100%;"/>
			</label>
			<label class="col-md-2"><small>Categoria:</small>
				<select name="categoria" class="form-control input-sm" style="width:100%;">
					<option value="">Selecione uma categoria</option>
					<?php

						$stat2 = $con->prepare("SELECT * FROM categorias ORDER BY descricao");
						$stat2->execute();
						while($row2 = $stat2->fetch())
						{
							echo '<option value="'.$row2['id_categoria'].'">'.$row2['descricao'].'</option>';
						} 
					?>
				</select>	
			</label>
			<label class="col-md-2"><small>&nbsp;</small>
				<input type="submit" value="Pesquisar" style="width:100%;" class="btn btn-warning btn-sm">
			</label>
		</form>

	<hr/>
</section>

<section class="container-fluid resultado" style="padding:10px 0px 10px 0px">