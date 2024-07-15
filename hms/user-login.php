<?php

session_start();
error_reporting(0);
require "include/config.php";


if(isset($_POST['username']))
{

	try{ 
	$ret=$con->prepare("SELECT * FROM `users` WHERE fullName=:name and password=:password");
	$ret->execute([
		'name'=>$_POST['username'],
		'password'=>md5($_POST['password'])
	]);
	// $ret=$con->prepare("SELECT * FROM users WHERE email='".$_POST['email']."' and password='".md5($_POST['password'])."'");
	}catch(PDOException $e){
		echo "error".$e->getMessage();
	}
	$result = $ret->fetch();

	if(!empty($result))
	{	

		$extra="dashboard.php";//
		$_SESSION['login']=$_POST['username'];
		$_SESSION['id']=$result['id'];
		$host=$_SERVER['HTTP_HOST'];
		$uip=$_SERVER['REMOTE_ADDR'];
		$status=1;

	
		// For stroing log if user login successfull
		try{ 
		$log=$con->prepare("insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
		$log->execute();
		}catch(PDOException $e){
			echo "error".$e->getMessage();
		}
	
		header("Location: ./dashboard.php");

		exit();
	}
	else
	{
		

		// For storing log if user login unsuccessfull
		$_SESSION['login']=$_POST['username'];	
		$uip=$_SERVER['REMOTE_ADDR'];
		$status=0;
		$sql=$con->prepare("insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
		$sql->execute();
		$_SESSION['errmsg']="Invalid username or password";
		$extra="user-login.php";
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");

		exit();
	}
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
		Utilisateur en ligne</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.html"><h2> Acceuil | Patient Login</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post" >
						<fieldset>
							<legend>
							Connectez-vous à votre compte
							</legend>
							<p>
								
									Veuillez entrer votre nom et votre mot de passe pour vous connecter.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="mot de passe">
									<i class="fa fa-lock"></i>
									 </span>
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right">
								Se connecter <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								
								Vous n'avez pas encore de compte?
								<a href="registration.php">
									Créer un compte
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Sun Hospital</span>. <span>All rights reserved</span>
					</div>
			
				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	
	</body>
	<!-- end: BODY -->
</html>