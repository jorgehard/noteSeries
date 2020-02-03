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
		$stmt = $con->prepare("INSERT INTO `categorias` (descricao) VALUES (?)"); 
		$stmt ->execute(array($descricao)); 
		echo '<div class="alert alert-success" style="margin:20px;">
				<strong>Sucesso!</strong> Categoria foi cadastrada com sucesso!!!
			  </div>';

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
            Cadastro de Categoria
            <small>Insira uma nova categoria</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cadastrar</a></li>
            <li class="active">Categoria</li>
          </ol>
</section>
<!-------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------->
<div class="resultado"></div>
<section class="container-fluid" style="padding-top:10px" id="return-fail">
	<form action="javascript:void(0)" class="form-inline" onSubmit="post(this,'add-categoria.php?ac=inserir','.resultado');" class="hidden-print">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<label style="width:100%; padding-bottom:5px;">
				<input type="text" style="height:40px;width:100%;" name="descricao" placeholder="Nome da Categoria" value="<?php echo $titulo ?>" class="form-control input-sm" required/>
			</label></br>
			<center><input type="submit" value="Cadastrar" style="width:45%; height:40px; margin-top:20px;" class="btn btn-sm btn-success" /></center>
		</div>
	</form>
</section>