<?php
require "hms/include/config.php";
	if(isset($_POST["submit"])){
		try{ 
			$sql = $con->prepare("INSERT INTO contact(`name`,`email`,`mobile`,`subject`,`content`) values(:name,:email,:mobile,:subject,:content)");
			$sql->execute([
				'name'=>$_POST['name'],
				'email'=>$_POST['email'],
				'mobile'=>$_POST['mobile'],
				'subject'=>$_POST['subject'],
				'content'=>$_POST['content']
			]);
		echo "<script>alert('Merci pour votre contact, nous vous repondrons dans les délai 😊')</script>";
		}catch(PDOException $e){
			echo "error d'insertion".$e->getMessage();
		}
	}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>HMS | Contact us</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<!--start-wrap-->
		
			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
				<img src="images/logos.png" width="150px" >

				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li ><a href="index.html">Accueil</a></li>
					
						<li class="active" style="margin-left:20px"><a href="contact.php">contact</a></li>
					</ul>					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		    <div class="clear"> </div>
		   <div class="wrap">
		   	<div class="contact">
		   	<div class="section group">				
				<div class="col span_1_of_3">
					
      			<div class="company_address">
				     	<h2>Adresse de l'hopital :</h2>
						    	<p>Congo Kongo Central,</p>
						   		<p>22-56-2-9 Kimpese, Quartier Premier</p>
						   		<p>quater</p>
				   		<p>Phone:+(243) 89 567 78 09</p>
				   		<p>Fax: (0243) 000 00 00 0</p>
				 	 	<p>Email: <span>Sunhospital@45.com</span></p>
				   	
				   </div>
				</div>				
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Nous</h2>
					    <form method="post">
					    	<div>
						    	<span><label>NOMS</label></span>
						    	<span><input type="text" value="" name="Nom utilisateur" required></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" value="" name="email" required ></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" value="" name="mobile" required ></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><input type="text" name="sujet" required ></span>
						    </div>
						    <div>
						    	<span><label>CONTENT</label></span>
						    	<span><textarea type="text" name="Contenu" required > </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" value="Contactez-Nous"></span>
						  </div>
					    </form>
				    </div>
  				</div>				
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
			</div>
	      <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="index.html">Accueil</a></li>
						
						<li><a href="contact.php">contact</a></li>
					</ul>
		   	</div>
			   <div class="footer-right">
		   			<ul>
						<li><img src="images/logos.png" width="120px" >
						</li>
						<!-- <li><a href="index.html">Accueil</a></li>
						<li><a href="contact.php">contact</a></li> -->
					</ul>
		   	</div>
		  
		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>

