<?php session_start();
	
	include("../config.php");
	$con = new DBConnection();
	
	if (isset($_POST["submit"])) {
		$email = preg_replace('/[^[:alnum:]_]/', '',$_POST['email']);
		$password = preg_replace('/[^[:alnum:]_]/', '',$_POST['password']);
		$md5password = md5($password);

		$stat = $con->prepare("SELECT * FROM login WHERE email = ? AND password = ?");
		$stat->execute(array($email,$md5password));
		$count = $stat->rowCount();
		if ($count == "1")
		{
			$row = $stat->fetch(PDO::FETCH_ASSOC);
			$_SESSION['id2'] = $row['id'];
			$_SESSION['email2'] = $email;
			$_SESSION['password2'] = $md5password;
			echo "<script>window.location='index.php';</script>";
		}else{
			echo '	
			<div class="container" style="max-width: 430px; margin-top:20px;">
				<div class="alert alert-danger">
					<strong>Login Inválido!! </strong> Senha ou Login incorretos, tente novamente!.
				</div>
			</div>';
		}
	}
	?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Painel">
		<meta name="author" content="jorgehenrique@live.com">
		<title>NoteSeries - Painel </title>
		<link href="../css/all-style.css" rel="stylesheet" type="text/css"/>
		<link href='https://fonts.googleapis.com/css?family=Lobster|Oswald' rel='stylesheet' type='text/css'>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
	</head>
	<body style="background:#222;">
		<div class="container">
			<form action="" method="post" class="form-signin">
				<div class="formHeader">
					<h2 class="form-signin-heading">NoteSeries © Painel</h2>
				</div>
				<div class="formCenter">
					<label for="" class="sr-only">Email </label>
					<input type="text" name="email" class="form-control" style="margin-bottom:10px" placeholder="Email" required autofocus>
					<label for="" class="sr-only">Senha	</label>
					<input type="password" name="password" class="form-control" placeholder="Senha" required>
				</div>
				<div class="formSubmit">
					<input class="btn bg-primary btn-block" type="submit" name="submit" value="Entrar"/>
				</div>
			</form>
		</div> 
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>
