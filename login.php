<?php 
	session_start();
	include("config.php");
	$con = new DBConnection();
	if (isset($_POST["submit"])) {
		$email = preg_replace('/[^[:alnum:]_\-@.]/', '',$_POST['email']);
		$password = preg_replace('/[^[:alnum:]_]/', '',$_POST['password']);
		$md5password = md5($password);
		$stat = $con->prepare("SELECT * FROM login_usuario WHERE email = ? AND senha = ?");
		$stat->execute(array($email,$md5password));
		$count = $stat->rowCount();
		if ($count == "1")
		{
			if($_POST['autologin'] == 1)
			{
				$cookie_time = (10 * 365 * 24 * 60 * 60);
				setcookie ('email', $email, time() + $cookie_time);
				setcookie ('password', $md5password, time() + $cookie_time);
			}
			$row = $stat->fetch(PDO::FETCH_ASSOC);
			
			$_SESSION['id_usuario'] = $row['id_usuario'];
			$_SESSION['nome_usuario'] = $row['nome'];
			$_SESSION['email_usuario'] = $email;
			$_SESSION['senha_usuario'] = $md5password;
			
			echo "<script>window.location='home.php';</script>";
		}else{
			$msg1 = true;
		}
	}
	?>
<!DOCTYPE html>
<html>
  <head>
    <title>NoteSeries</title>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<link href="css/all-style.css" rel="stylesheet" type="text/css"/>
	<link href="css/all-login-user.css" rel="stylesheet" type="text/css"/>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	
    <script>
    $(window).load(function() {
        $('#loading').fadeOut(200);
    });
    </script>
	</head>

  <body style="background-color:#000">
  <div class="background-login"></div>
	<div class="container-fluid top-nick-bar">
		<span class="title-top"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> NoteSeries</span>
	</div>
	<div class="container-fluid">
		<?php 
		if(isset($msg1)){ 
		echo '	
			<div class="container" style="max-width: 430px; margin-top:20px;">
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong style="color:#A94442">Login Inválido!!</strong> Senha ou Login incorretos, tente novamente!.
				</div>
			</div>';
		}
		?>
		<div class="form-signin-2">
			<div class="formHeader">
				<h2 class="form-signin-heading-2">NoteSeries © </h2>
			</div>
			<fieldset>
				<form method="post">
					<div>
						<div class="form-group">
							<input class="form-control input-sm" type="email" name="email" placeholder="Email" required autofocus/>
						</div>
						<div class="form-group">
							<input class="form-control input-sm" type="password" name="password" placeholder="Senha" required/>
						</div>          
						<div class="form-group remember-me">
							<input type="checkbox" value="1" name="autologin"/> Lembrar-me
						</div>
					</div>
					<div class="footer">                                                               
						<input class="btn btn-block" type="submit" name="submit" value="Entrar"/>
                    
						<p class="register-button text-center">Ainda não tem cadastro ? <a href="#" class="button-register"> Cadastre-se</a></p>
					</div>
				</form>
			</fieldset>
			<div class="text-center" style="margin-top:20px">
				<button style="color:#FFF; background:#3b5998; margin-right:5px;" class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
				<button style="color:#FFF; background:#00aced; margin-right:5px;" class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
				<button style="color:#FFF; background:#d34836" class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
			</div>
		</div>
	</div>
	<div id="loading" style="position: absolute; height: 100%; width: 100%; top:0; left: 0; background: #FFF; z-index:9999; 
    font-size: 30px; text-align: center; padding-top: 10px; color: #666;">
		<img src="img/loading.gif" alt="" width="120"/>
		<h4 style="font-family: 'Indie Flower', cursive; position:relative; bottom:20px;">Aguarde a pagina carregar...</h4>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>