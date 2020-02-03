<?php 
session_start();
require_once('config.php');
$con = new DBConnection();
function verificaLogin(){
	global $con, $status;
	if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
		$stat = $con->prepare("SELECT * FROM login_usuario WHERE email = ? AND senha = ?");
		$stat->execute(array($_COOKIE['email'],$_COOKIE['password']));
		$count = $stat->rowCount();
		if ($count == "1"){
			$row = $stat->fetch(PDO::FETCH_ASSOC);
			$_SESSION['id_usuario'] = $row['id_usuario'];
			$_SESSION['nome_usuario'] = $row['nome'];
			$_SESSION['email_usuario'] = $_COOKIE['email'];
			$status = true;
		}
	}else{
		if(isset($_SESSION['id_usuario']) && isset($_SESSION['email_usuario'])){
			$status = true;
		}else{
			$status = false;
			echo "<script>window.location='login.php';</script>";			
		}	
	}
}
?>