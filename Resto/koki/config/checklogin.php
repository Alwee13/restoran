<?php
function check_login()
{
if(strlen($_SESSION['id_koki'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";
		$_SESSION["id_koki"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>
