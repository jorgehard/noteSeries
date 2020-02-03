<?php
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
extract($_POST); 
extract($_GET);
date_default_timezone_set('America/Sao_Paulo');
class DBConnection extends PDO
{
    public function __construct()
    {
		try{
			$DBhost = "localhost";			$DBuser = "root";			$DBpass = "";
			$DBname = "noteseries";
			parent::__construct("mysql:host=".$DBhost.";dbname=".$DBname."",$DBuser, $DBpass);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $i)
		{
			echo 'Error: ' . $i->getMessage();
		}
	}
}