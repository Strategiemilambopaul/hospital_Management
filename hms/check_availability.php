<?php 
require_once("include/config.php");
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	
		$result =$con->prepare("SELECT email FROM users WHERE email='$email'");
		$result->execute();
		$count=count($result->fetchAll());
if($count>0)
{
echo "<span style='color:red'> l'email existe déjà.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'>E-mail disponible pour l'inscription.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
