<?php
session_start();
$cde=$_GET['cde'];
$proc=$_GET['proc'];

include('../db/cnx.php');

if($proc==0){
$req="DELETE FROM comptagetr WHERE ID=".$cde;
}
if($proc==1){
$req="DELETE FROM stockagetr WHERE ID=".$cde;
}
$result=$mysqli->query($req);
if (result === FALSE) {
	echo "Error deleting record: " . $mysqli->error;
	$mysqli->close();
	exit();
}
$mysqli->close();
if($proc==0){
header('location:../calctrpage.php');
exit();
}
if($proc==1){
	header('location:../recstats.php');
	exit();
}
?>