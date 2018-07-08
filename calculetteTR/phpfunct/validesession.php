<?php
session_start();
include('../db/cnx.php');

$req="INSERT INTO stockagetr (datef,ident,codef,typef,valeurfac,diverstr) SELECT datescan,numident,code,type, valeurf,divers FROM comptagetr";

if ($mysqli->query($req) === FALSE) {
	echo "Error INSERT 1 record: " . $mysqli->error;
	$mysqli->close();
	exit();
}

$totticket=0;
$req0="SELECT * FROM comptagetr";
$result0=$mysqli->query($req0);
if ($result0 === FALSE) {
	echo "Error SELECT 1 record: " . $mysqli->error;
	$mysqli->close();
	exit();
}
while($data=$result0->fetch_assoc())
{
	$totticket+=$data['valeurf'];
}
$totticket=number_format($totticket,2,'.','');
$nbrrow=mysqli_num_rows($result0);
$sessnbr=intval($_SESSION['sesscomptage']);
$j=date("d");
$m=date("m");
$y=date("Y");

$req1="INSERT INTO bordereau (num,annee,mois,jour,nbrticket,valeurtot) VALUES (".$sessnbr.",'".$y."','".$m."','".$j."',".$nbrrow.",".$totticket.")";
$result1=$mysqli->query($req1);
if ($result1 === FALSE) {
	echo "Error insert 2 record: " . $mysqli->error;
	$mysqli->close();
	exit();
}

$req='TRUNCATE comptagetr';
if ($mysqli->query($req) === FALSE) {
	echo "Error deleting 1 record: " . $mysqli->error;
	$mysqli->close();
	exit();
}

$mysqli->close();
header('location:../finsession.php');
exit();
?>