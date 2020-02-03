<?php require __DIR__ . "/bootstrap.php";
	  require_once("../../config.php"); 
	  $con = new DBConnection();
?>
<!DOCTYPE html>
<html>
	<head>
		<style type='text/css'>
			body,td,th { font-size:12px; font-family:sans-serif; } b.active { color:#b00;background-color:#fff;text-decoration:underline;}
		</STYLE>
		<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	</head>

<?php
if (isset ($_GET["mid"]) && preg_match('/^[0-9]+$/',$_GET["mid"])) {

  $movieid = $_GET["mid"];
  $movie = new \Imdb\Title($_GET["mid"]);
  $source  = "<B CLASS='active'>IMDB</B>";
  $rows = 2; 
  $rating = $movie->rating()/2;

  #############################################################
	if(isset($_POST['enviarSerie'])){
		$stmt = $con->prepare('SELECT * FROM series WHERE mid = ?');
		$stmt->execute(array($mid));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(!$row)
		{
			try
			{
				$stmt = $con->prepare('INSERT INTO `series` (mid, titulo, descricao, ano, rating, keywords, duracao, categoria, img, img_bg, data_cad) VALUES (:mid, :titulo, :descricao, :ano, :rating, :keywords, :duracao, :categoria, :img, :img_bg, now())');
				$stmt->execute(array(
					':mid' => $mid,
					':titulo' => $movie->title(),
					':descricao' => $movie->plotoutline(),
					':ano' => $movie->year(),
					':rating' => $rating,
					':keywords' => implode(', ',$movie->keywords()),
					':duracao' => $movie->runtime(),
					':categoria' => implode(', ',$movie->genres()),
					':img' => "http://www.pakistancardealers.com/dealers/imgs/no-image.jpg",
					':img_bg' => "http://www.pakistancardealers.com/dealers/imgs/no-image.jpg"
				));
				echo 'Serie Cadastrada';
			}
			catch(PDOException $e)
			{
				echo 'Error: ' . $e->getMessage();
			}
		}else{
			echo 'Ja Existe esta Serie';
		}
	}
  ######### SES ############
  echo '<form action="" method="post">
		  <input type="submit" name="enviarSerie" value="Salvar Serie"/>
		</form>   ';
  echo '<form action="" method="post">
		  <input type="submit" name="enviarEpisodios" value="Salvar Episodios"/>
		</form>   ';
  echo '<form action="upload.php" target="_blank" method="post">
			<input type="hidden" name="img_serie" value="'.$movie->photo().'"/> 
			<input type="hidden" name="mid_serie" value="'.$mid.'"/> 
			<input type="submit" name="enviar" value="Salvar Imagem"/>
		</form>   ';
		
  echo ''.$movie->photo().'<br/>';
  //TITULO +
  echo '<b> ID: </b>'.$mid.'<br>';
  echo '<b> Titulo: </b>'.$movie->title().'<br>';
  
  //KEYWORDS
  echo '<b> Palavras Chaves: </b>'.implode(', ',$movie->keywords()).'<br>';
  
  //DESCRIÇÃO +
  echo '<b> Descrição: </b>'.$movie->plotoutline().'<br>';
  
  //ANO +
  echo '<b> Ano: </b>'.$movie->year().'<br>';
	
  //DURAÇÃO +
  echo '<b> Duração: </b>'.$movie->runtime().'<br>';
  
  //RATING
  echo '<b> Rating: </b>'.$rating.'<br>';
   
  //CATEGORIA
  echo '<b> Categorias: </b>'.implode(', ',$movie->genres()).'<br>';
  
  echo '<br> <H4> ##### EPISODIOS ##### </H4> <br>';

 #####EPISODIOS#####
	foreach ( $movie->episodes() as $season => $ep ) {
		foreach ( $ep as $episodedata ) {
			if($episodedata['plot'] != ''){
				if(isset($_POST['enviarEpisodios'])){
					$stmt = $con->prepare('SELECT * FROM series WHERE mid = ?');
					$stmt->execute(array($mid));
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					if(!$row){
						echo 'Serie Ainda Não cadastrada';
						exit;
					}else{
						$stmt = $con->prepare('SELECT * FROM episodios WHERE id_serie = ? and num_temp = ? and num_ep = ?');
						$stmt->bindParam(1, $row['id'], PDO::PARAM_INT);
						$stmt->bindParam(2, $episodedata['season'], PDO::PARAM_INT);
						$stmt->bindParam(3, $episodedata['episode'], PDO::PARAM_INT);
						$stmt->execute();
						$rowb = $stmt->fetch(PDO::FETCH_ASSOC);
						if(!$rowb)
						{
							try
							{
								$stmt = $con->prepare('INSERT INTO `episodios` (num_temp, num_ep, nome, descricao_ep, id_serie, data_ep) VALUES (:num_temp, :num_ep, :nome, :descricao_ep, :id_serie, now())');
								$stmt->execute(array(
									':num_temp' => $episodedata['season'],
									':num_ep' => $episodedata['episode'],
									':nome' => $episodedata['title'],
									':descricao_ep' => $episodedata['plot'],
									':id_serie' => $row['id']
								));
							}
							catch(PDOException $e)
							{
								echo 'Error: ' . $e->getMessage();
							}
						}
					}
				}
				
				
				
			  //NUMERO TEMPORADA
				echo '<b>Temporada: </b>'.$episodedata['season'].'<br/>';
			  
			  //NUMERO EPISODIOS
				echo '<b>Episodio: </b>'.$episodedata['episode'].'<br/>';
			  
			  //NOME EPISODIOS
				echo '<b> Titulo: </b>'.$episodedata['title'].'<br/>';
			  
			  //DESCRIÇÃO EPISODIOS
				echo '<b>Descrição: </b>'.$episodedata['plot'].'<br/><br/>';
					
			  //ID SERIES
			   ##
			  //
			}  
		}
	} 
}
?>

</html>