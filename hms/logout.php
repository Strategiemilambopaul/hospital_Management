<?php
session_start();
require 'include/config.php';
$_SESSION['login']=="";
date_default_timezone_set('Africa/Kinshasa'); // that depends on your Zone area
$ldate=date( 'd-m-Y h:i:s A', time () );
$sql=$con->prepare("UPDATE userlog  SET logout = '$ldate' WHERE uid = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
$sql->execute();
session_unset();
//session_destroy();
$_SESSION['errmsg']="Vous vous êtes déconnecté avec succès";
?>
<script language="javascript">
document.location="../index.html";
</script>
