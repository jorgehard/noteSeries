<?php 
function protege(){
	if(!isset($_SESSION['email2']) && !isset($_SESSION['password2']) && !isset($_SESSION['id2'])) {
		echo "<script>window.location='login.php';</script>";
		exit;
	}
}
?>