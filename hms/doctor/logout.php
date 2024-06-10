<?php
session_start();
require 'include/config.php';
$_SESSION['dlogin']=="";
date_default_timezone_set('Africa/Kinshasa');
$ldate=date( 'd-m-Y h:i:s A', time () );
$sql = $con->prepare("UPDATE doctorslog  SET logout = '$ldate' WHERE uid = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
$sql->execute();
session_unset();
//session_destroy();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="index.php";
</script>
