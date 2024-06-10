<?php
function check_login()
{
	if(empty($_SESSION['login']))
	{	
		/* Redirection vers une page différente du même dossier */
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'user-login.php';
		header("Location: http://$host$uri/$extra");
		exit;
	}
}
?>