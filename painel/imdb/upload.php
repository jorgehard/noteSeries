<?php
	include("../../config.php");
	$con = new DBConnection();
	$img = $_POST["img_serie"];
	$stmt = $con->prepare('SELECT * FROM series WHERE mid = ?');
	$stmt->execute(array($mid_serie));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!$row){
		echo 'Serie Ainda Não cadastrada';
		exit;
	}else{
		$id_serie = $row['id'];
		if($img==''){  
			echo "<script>alert('Envie alguma imagem');</script>";
			echo '<script>window.close();</script>';
		}else{
			if($img!=""){
				try{
					$stmt = $con->prepare("UPDATE `series` SET img = :img WHERE id = :id");
					$stmt->execute(array(
						':img'   => $img,
						':id' => $id_serie
					  ));
				}
				catch(PDOException $i)
				{
					echo 'Error:' . $i->getMessage();
				}
				echo "<script>alert('Imagem Cadastrada com sucesso!!!');</script>";
				echo '<script>window.close();</script>';
			}else{
				echo "<script>alert('Ouve algum problema!! Tente novamente')</script>";
				echo '<script>window.close();</script>';
				echo $pms['data']['error'];  
			} 
		}
	} 
?>