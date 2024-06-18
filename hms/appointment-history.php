<?php
session_start();
//error_reporting(0);
require 'include/config.php';
require 'include/checklogin.php';

check_login();
if(isset($_GET['cancel']))
		  {
		          $sql = $con->prepare("update appointment set userStatus='0' where id = '".$_GET['id']."'");
				  $sql->execute();
                  $_SESSION['msg']="Votre rendez-vous annulé!!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Utilisateur | Historique des rendez-vous</title>
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
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php require 'include/sidebar.php';?>
			<div class="app-content">
				

					<?php require 'include/header.php';?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h2 class="mainTitle">Utilisateur | Historique des rendez-vous</h2>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Utilisateur </span>
									</li>
									<li class="active">
										<span>Historique des rendez-vous</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-striped" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="hidden-xs">Nom du Docteur</th>
												<th>Specialisation</th>
												<th>Frais de consultation</th>
												<th>Date/heure du rendez-vous</th>
												<th>Date de création du rendez-vous</th>
												<th>Statut actuel</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
<?php
try{ 
	$sql=$con->prepare("SELECT doctors.doctorName as docname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId where appointment.userId=:userid");
	$sql->execute([
		'userid'=>$_SESSION['id']
	]);
	$array= $sql->fetchAll();

}catch(PDOException $e){
	echo "error".$e->getMessage();
}

$cnt=1;

foreach($array as $row)
{
	// var_dump($row);
?>

											<tr <?php if($row['doctorStatus']==0):?><?= "class='bg-warning'"?> <?php endif ?>>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['docname'];?></td>
												<td><?php echo $row['doctorSpecialization'];?></td>
												<td><?php echo $row['consultancyFees']."Fc";?></td>
												<td><?php echo $row['appointmentDate'];?> / <?php echo
												 $row['appointmentTime'];?>
												</td>
												<td><?php echo $row['postingDate'];?></td>
												<td>
												<?php
												if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
												{
													echo "<span class='badge bg-info'>Active...</span>";
												}
												if(($row['userStatus']==1) && ($row['doctorStatus']==2))  
												{
													echo "Rendez-vous accpté";
												}

												if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
												{
													echo "Annuler par vous";
												}

												if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
												{
													echo "Annuler par le médecin";
												}
												?>
												</td>
											<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
{ ?>

													
	<a href="appointment-history.php?id=<?= $row['id']?>&cancel=update" onClick="return confirm('Êtes-vous sûr de vouloir annuler ce rendez-vous?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Annuler</a>
	<?php } elseif(($row['userStatus']==1) && ($row['doctorStatus']==2)) {

		echo "<span class='badge bg-success'>Accepté</span>";
		}
		else{
			echo "<span class='badge bg-danger'>Annulé</span>";
		}
		?>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Editer
																</a>
															</li>
															<li>
																<a href="#">
																	Partager
																</a>
															</li>
															<li>
																<a href="#">
																	Supprimer
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
						
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php require 'include/footer.php';?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php require 'include/setting.php';?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
