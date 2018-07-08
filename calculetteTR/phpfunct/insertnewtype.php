<?php
session_start();

if (!isset($_POST['code']) or !isset($_POST['typeticket'])) {
	echo 'Probleme transmission par methode POST depuis la page typetr.php--- veuillez deboguer!!';
	exit();
}

$code= $_POST['code'];
$code= trim($code);
$code= strip_tags($code);
$code= stripslashes($code);
$code= htmlspecialchars($code);

$type=$_POST['typeticket'];
$type=trim($type);
$type= strip_tags($type);
$type= stripslashes($type);
$type= htmlspecialchars($type);

include('../db/cnx.php');
$code=mysqli_real_escape_string($mysqli,$code);
$type=mysqli_real_escape_string($mysqli,$type);

$req="INSERT INTO trtype (CodeType,typeTicket) VALUES ('".$code."','".$type."')";


if ($mysqli->query($req) === FALSE) {
	echo "Error deleting record: " . $mysqli->error;
	$mysqli->close();
	exit();
}
$mysqli->close();

header('location:../typetr.php');
exit();
?>