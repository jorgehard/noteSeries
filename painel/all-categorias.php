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

<section class="content-header" style="border-bottom:1px solid #ccc">
          <h1 style="font-family: 'Oswald', sans-serif;letter-spacing:4px; padding-bottom:10px;">
            Consulta de Categorias
            <small>Consulte por uma categoria</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Consultar</a></li>
            <li class="active">Series</li>
          </ol>
</section>
<!-------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------->
<section class="container-fluid" style="padding:10px 0px 10px 0px">
<table width="100%" class="table table-striped table-condensed table-bordered small">
<thead><tr class="small"><th>ID:</th><th>Descrição</th><th>Editar</th></tr></thead>
<tbody>
	<?php 
		$stat = $con->prepare("SELECT * FROM categorias");
		$stat->execute();
		while($row = $stat->fetch())
		{
			echo '<tr>';
				echo '<td width="5%">'.$row['id_categoria'].'</td>';
				echo '<td>'.$row['descricao'].'</td>';
				echo '<td width="5%">Edit</td>';
			echo '</tr>';
		} 
	?>
</tbody>
</table>
</section>