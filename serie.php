<?php
	require_once('config.php');
	require_once('functions.php');
	$con = new DBConnection();
	verificaLogin();
	$stat = $con->prepare("SELECT * FROM series WHERE id = ?");
	$stat->execute(array($id));
	while($row = $stat->fetch())
	{
		$img_serie = $row['img'];
		$img_bg = $row['img_bg'];
		$titulo_serie = $row['titulo'];
		$descricao_serie = $row['descricao'];
		$ano_serie = $row['ano'];
		$duracao_serie = $row['duracao'];
		$id_categoria = $row['categoria'];
		$rating = $row['rating'];
  if($rating <= 0.5){
	  $rating_star = '
	  <i class="fa fa-star-half-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  ';
  }else if(($rating >= 0.6) && ($rating <= 1)){
	  $rating_star = '
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  ';
  }else if(($rating >= 1.1) && ($rating <= 1.5)){
	 $rating_star = '
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star-half-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  ';
  }else if(($rating >= 1.6) && ($rating <= 2)){
	  $rating_star = '
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  ';
  }else if(($rating >= 2.1) && ($rating <= 2.5)){
	  $rating_star = '
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star-half-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  '; 
  }else if(($rating >= 2.6) && ($rating <= 3)){
	  $rating_star = '
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  '; 
  }else if(($rating >= 3.1) && ($rating <= 3.5)){
	  $rating_star = '
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star-half-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  ';
  }else if(($rating >= 3.6) && ($rating <= 4)){
	  $rating_star = '
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  ';
  }else if(($rating >= 4.1) && ($rating <= 4.5)){
	  $rating_star = '
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star-half-o" aria-hidden="true"></i>
	  <i class="fa fa-star-o" aria-hidden="true"></i>
	  ';
  }else if(($rating >= 4.6) && ($rating <= 5)){
	  $rating_star = '
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  <i class="fa fa-star" aria-hidden="true"></i>
	  ';
  }
	} 
	if(@$temp_control == 'click'){
		$stat = $con->prepare("SELECT * FROM episodios WHERE id_serie = ? and num_temp = ? ORDER BY num_ep ASC");
		$stat->execute(array($id,$num_temp));
		while($row = $stat->fetch())
		{
			$view = $con->prepare("SELECT * FROM assistidos WHERE id_serie = ? and id_ep = ? and id_usuario = ?");
			$view->execute(array($row['id_serie'], $row['id_ep'], $_SESSION['id_usuario']));
			$rowb = $view->fetchColumn();
			
			if($rowb != ''){
				echo '<li style="text-overflow:ellipsis; opacity:0.5; white-space: nowrap; overflow:hidden; padding-right:30px;">';
			}else{
				echo '<li style="text-overflow:ellipsis; white-space: nowrap; overflow:hidden; padding-right:30px;">';
			}
			
			echo '	<span style="padding:6px 12em 6px 0px;" onclick=\'$(".box-episodios-descri").load("serie.php?ep_descri=click&id='.$id.'&id_ep='.$row['id_ep'].'")\'>'.$row['num_ep'].' &nbsp; '.$row['nome'].' </span>';
							
			if($rowb != ''){
				echo '<a style="position:absolute; right:20px; padding-right:10px;"><i style="color:#259954;" class="fa fa-eye-slash" aria-hidden="true"></i></a>';
			}else{
				echo '<a id="idEpisodeVer'.$row['id_ep'].'" href="#" onclick=\'$("#idEpisodeVer'.$row['id_ep'].'").load("serie.php?ep_view=click1&id='.$id.'&id_ep='.$row['id_ep'].'")\' style="position:absolute; right:20px; padding-right:10px;"><i class="fa fa-eye" aria-hidden="true"></i></a>';
					}
					echo '</li>';
		}
		if(@$ep_descri == ''){
			echo '<script>$(".box-episodios-descri").empty();</script>';
		}
		exit;
	}
	if(@$ep_descri == 'click'){
		$stat = $con->prepare("SELECT * FROM episodios WHERE id_serie = ? and id_ep = ? ORDER BY num_ep ASC");
		$stat->execute(array($id,$id_ep));
		while($row = $stat->fetch())
		{
			echo '<h3 style="color:#fff; font-family: \'Oswald\', sans-serif; margin-top:0px; ">'.strtoupper($row['nome']).'</h3>';
			echo '<p>'.$row['descricao_ep'].'</p>';
		}
		exit;
	}
	if(@$ep_view == 'click1'){
		$viewb = $con->prepare("SELECT * FROM assistidos WHERE id_serie = ? and id_ep = ? and id_usuario = ?");
		$viewb->execute(array($id, $id_ep, $_SESSION['id_usuario']));
		$rowc = $viewb->fetchColumn();
		
		if($rowc == ''){
			$stat = $con->prepare("SELECT * FROM episodios WHERE id_serie = ? and id_ep = ? ORDER BY num_ep ASC");
			$stat->execute(array($id,$id_ep));
			while($row = $stat->fetch())
			{
				$stmt = $con->prepare("INSERT INTO `assistidos` (id_usuario,id_serie,id_ep) VALUES (?,?,?)"); 
				$stmt ->execute(array($_SESSION['id_usuario'], $id, $id_ep));
				echo '<a style="position:absolute; right:0px; padding-right:10px;"><i style="color:#259954;" class="fa fa-eye-slash" aria-hidden="true"></i></a>';
			}
		}else{
			echo '<a style="position:absolute; right:0px; padding-right:10px;"><i style="color:#259954;" class="fa fa-eye-slash" aria-hidden="true"></i></a>';
		}
		exit;
	}
?>
	<div class="row modal-box-banner">
		<div class="row img-top-modal" style="background: url('<?php echo $img_bg; ?>') repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"> </div>
		<div class="col-md-11">
			<div class="col-md-12 col-xs-12" style="z-index:11">
				<button type="button" class="close" onclick="$('.modal').modal('hide')" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="col-md-2 col-xs-12 capa-modal">
				<img src="<?php echo $img_serie; ?>" alt="<?php echo $titulo_serie; ?>" class="img-responsive"/>
			</div>
			<div class="col-md-10 col-xs-12 geral-box-modal">
				<h3 style="font-family: 'Oswald', sans-serif; letter-spacing:2px">
					<?php echo strtoupper($titulo_serie); ?>
				</h3>
				<p>
					<ul style="" class="list-inline group-top-info">
						<li>
							<?php
								echo $id_categoria;
							?>
						</li>
						<li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $duracao_serie.' min'; ?></li>
						<li><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo $ano_serie; ?></li>
						<li>
							<?php echo $rating_star; ?>
						</li>
					
					
					</ul>
				</p>
				<p class="descricao">
					<?php echo $descricao_serie; ?> 
				</p>
			</div>
		</div>
	</div>
	<script>
	var $lastClicked = null;

		$('.step_wrapper').on('click','.step_box',function () {
			$(this).parent().find('.step_box').removeClass('active-group-list');
			$(this).addClass('active-group-list');
			$lastClicked = $(this);
		});
	</script>
	<div class="row" style="padding:15px;">
		<div class="col-md-2" style="padding-top:20px">
			<h4 style="color:#fff; font-family: 'Ubuntu', sans-serif; font-size:18px; margin-top:0px; ">Temporadas</h4>
			<ul style="color:#fff; font-family: 'Roboto', sans-serif;" class="group-list step_wrapper">
				<?php
				$stat = $con->prepare("SELECT * FROM episodios WHERE id_serie = ? GROUP BY num_temp ASC ORDER BY num_temp ASC");
				$stat->execute(array($id));
				while($row = $stat->fetch())
				{
					if($row['num_temp']=='1'){ echo '<li class="step_box active-group-list">'; } else {
					echo '<li class="step_box">'; }
					echo '<a href="#" style="display:block" onclick=\'$(".box-episodios").load("serie.php?temp_control=click&id='.$id.'&num_temp='.$row['num_temp'].'")\'"> Temporada &nbsp;'.$row['num_temp'].'</a></li>';
				}
				?>
			</ul>
		</div>
		<div class="col-md-6" style="padding-top:20px">
			<h4 style="color:#fff; font-family: 'Ubuntu', sans-serif; font-size:18px; margin-top:0px;">Episódios</h4>
			<ul style="color:#fff" class="group-list box-episodios">
				<?php
				$stat = $con->prepare("SELECT * FROM episodios WHERE id_serie = ? and num_temp = ? ORDER BY num_ep ASC");
				$stat->execute(array($id,'1'));
				while($row = $stat->fetch())
				{
					$view = $con->prepare("SELECT * FROM assistidos WHERE id_serie = ? and id_ep = ? and id_usuario = ?");
					$view->execute(array($row['id_serie'], $row['id_ep'], $_SESSION['id_usuario']));
					$rowb = $view->fetchColumn();
					
					if($rowb != ''){
						echo '<li style="text-overflow:ellipsis; opacity:0.5; white-space: nowrap; overflow:hidden; padding-right:30px;">';
					}else{
						echo '<li style="text-overflow:ellipsis; white-space: nowrap; overflow:hidden; padding-right:30px;">';
					}
					echo '
						<span style="padding:6px 12em 6px 0px;" onclick=\'$(".box-episodios-descri").load("serie.php?ep_descri=click&id='.$id.'&id_ep='.$row['id_ep'].'")\'>'.$row['num_ep'].' &nbsp; '.$row['nome'].' </span>';
						
					if($rowb != ''){
						echo '<a title="Visto" style="position:absolute; right:20px; padding-right:10px;"><i style="color:#259954;" class="fa fa-eye-slash" aria-hidden="true"></i></a>';
					}else{
						echo '<a id="idEpisodeVer'.$row['id_ep'].'" title="Marcar episodio como visto" href="#" onclick=\'$("#idEpisodeVer'.$row['id_ep'].'").load("serie.php?ep_view=click1&id='.$id.'&id_ep='.$row['id_ep'].'")\' style="position:absolute; right:20px; padding-right:10px; opacity:1;"><i class="fa fa-eye" aria-hidden="true"></i></a>';
					}
					echo '</li>';
				}
				?>
			</ul>
		</div>
		<div class="col-md-4" style="padding-top:20px">
			<ul style="color:#fff" class="group-list box-episodios-descri"> 
			<?php
				$stat = $con->prepare("SELECT * FROM episodios WHERE id_serie = ? and num_temp = ? and num_ep = ? ORDER BY num_ep ASC");
				$stat->execute(array($id,'1', '1'));
				while($row = $stat->fetch())
				{
					echo '<h3 style="color:#fff; font-family: \'Oswald\', sans-serif; margin-top:0px; ">'.strtoupper($row['nome']).'</h3>';
					echo '<p>'.$row['descricao_ep'].'</p>';
				}
			?>
			</ul>
		</div>
	</div>