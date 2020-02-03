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

 <style type="text/css">
.customFileInput{
	height: 380px; 
	text-align:center;
	width:100%; 
	opacity:0.7; 
	border:1px dashed #333; 
	background-color: transparent;
}
.customFileInput input {
    position: absolute;
    visibility: hidden;
}

.customFileInput .button-file,
.customFileInput .fileName {
    float: left;
    cursor: pointer;
    font-size: 0.9em;
    line-height: 30px;
    padding: 0 15px;
}
 
.customFileInput .button-file {
	padding-top:50%;
	width:100%;
	height:100%;
}
 
.customFileInput .fileName {
    color: #000;
	width:100%;
	word-wrap:break-word;
}
 
.customFileInput:hover{
    background-color: #FFF;
}
</style>
<script type="text/javascript">

function showFileName(inputFile) {
    inputFile.offsetParent.getElementsByClassName('fileName')[0].innerHTML = inputFile.value.replace(/Foto\\/g, 'Foto /').split('Foto /').pop();
	$(".button-file").text("Foto pronta para envio!").css("background-color", "#0F414F").css("opacity", "0.5").css("color","#ccc");
}

</script>
<script>
$(document).ready(function()
{
	$(".inputOnlyNumber").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) && (e.keyCode < 193 || e.keyCode > 193)) {
            e.preventDefault();
        }
    });
});

</script>
<section class="content-header" style="border-bottom:1px solid #ccc">
          <h1 style="font-family: 'Oswald', sans-serif;letter-spacing:4px; padding-bottom:10px;">
            Cadastro de Serie
            <small>Insira uma nova serie no banco de dados</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cadastrar</a></li>
            <li class="active">Nova Serie</li>
          </ol>
</section>
<!-------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------->
<section class="container-fluid" style="padding-top:10px" id="return-fail">
	<form action="upload.php?todayTotal=<?php echo $todayTotal ?>" target="_blank" class="form-horizontal"  method="post" enctype="multipart/form-data">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="col-xs-12 col-sm-6 col-md-3">
				<label class="customFileInput">
					<div class="button-file">Carregar uma foto</div>
					<div class="fileName"></div>
					<input type="file" name="fileToUpload" id="fileToUpload" onchange="showFileName(this)">
				</label>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-9">
				<label style="width:100%; padding-bottom:5px;">
					<input type="text" style="height:50px" name="titulo" placeholder="Titulo" value="<?php echo $titulo ?>" class="form-control input-sm" required/>
				</label></br>
				<label style="width:100%; padding-bottom:5px;">
					<textarea name="descricao" style="height:150px" placeholder="Descrição" class="form-control input-sm" required><?php echo $descricao ?></textarea> 
				</label></br>
				<div class="col-md-6" style="padding:0">
					<label style="width:100%; padding-bottom:5px;">
						<input type="text" name="ano" style="height:50px" value="<?php echo $ano ?>" onfocus="$(this).mask('9999')" placeholder="Ano" class="form-control input-sm" required/>
					</label>
				</div>
				<div class="col-md-6" style="padding-right:0">
					<label style="width:100%; padding-bottom:5px;">
						<input type="text" name="duracao" style="height:50px" value="<?php echo $duracao ?>" placeholder="Duração (minutos)" maxlength="3" class="inputOnlyNumber form-control input-sm" required/>
					</label>
				</div>
				<label style="width:100%; padding-bottom:5px;">
				<select name="categoria" class="form-control input-sm" style="height:50px;">
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
				<center><input type="submit" value="Cadastrar" style="width:50%; height:50px; margin-top:20px;" class="btn btn-sm btn-success" /></center>
			</div>
		</div>
	</form>
</section>
<div class="resultado"></div>