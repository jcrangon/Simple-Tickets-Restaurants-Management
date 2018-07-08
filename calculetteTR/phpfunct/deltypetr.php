<?php
session_start();
$cde=$_GET['cde'];
include('../db/cnx.php');

$req="DELETE FROM trtype WHERE CodeType=".$cde;

if ($mysqli->query($req) === FALSE) {
	echo "Error deleting record: " . $mysqli->error;
	$mysqli->close();
	exit();
}
$mysqli->close();

header('location:../typetr.php');
exit();
?>