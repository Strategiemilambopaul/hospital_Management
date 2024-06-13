<?php
require 'include/config.php';
if(!empty($_POST["specilizationid"])) 
{

 $sql=$con->prepare("select doctorName,id from doctors where specilization='".$_POST['specilizationid']."'"); $sql->execute(); $array= $sql->fetchAll() ?>
 <option selected="selected">Sélectionnez un médecin </option>
 <?php
foreach($array as $row)
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['doctorName']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"])) 
{

 $sql=$con->prepare("select docFees from doctors where id='".$_POST['doctor']."'");
 $sql->execute();
 $array = $sql->fetchAll();
foreach($array as $row)
 	{?>
 <option value="<?php echo htmlentities($row['docFees']); ?>"><?php echo htmlentities($row['docFees'])."Fc"; ?></option>
  <?php
}
}

?>

