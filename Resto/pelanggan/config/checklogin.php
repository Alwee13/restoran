<?php
function check_login()
{
if(strlen($_SESSION['id_pelanggan'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";
		$_SESSION["id_pelanggan"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>
