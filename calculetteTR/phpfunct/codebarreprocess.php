<?php
session_start();

$datefr=$_POST['datepicke'];
$code=$_POST['codeb'];

$tab = explode("/",$datefr);
//$datemy = $tab[2]."-".$tab[1]."-".$tab[0];
$datemy=$datefr;
$strtypecde=substr($code,16,1);
$typecde=intval($strtypecde);
$typetkt='';


$strvaltkt=substr($code,12,4);
$valtkt=floatval($strvaltkt)/100;
$valtkt=number_format($valtkt,2,'.','');
$tktident=substr($code,0,10);
$sessnbr=0;

include('../db/cnx.php');
$req0="SELECT ID FROM comptagetr WHERE numident='".$tktident."' AND code=".$typecde;
$result0=$mysqli->query($req0);
if ($result === FALSE) {
	echo "Error selecting record: " . $mysqli->error;
	$mysqli->close();
	exit();
}
$nbrrow0=mysqli_num_rows($result0);

if($nbrrow0==0){

	$req="SELECT * FROM trtype";

	$result=$mysqli->query($req);
	if ($result === FALSE) {
		echo "Error selecting record: " . $mysqli->error;
		$mysqli->close();
		exit();
	}

	$nbrrow=mysqli_num_rows($result);
	if($nbrrow!=0){
		while($data=$result->fetch_assoc())
		{
			if($typecde==$data['CodeType']){
				$typetkt=$data['typeTicket'];
			}
		}
		if($typetkt==''){
			$typecde='99';
			$typetkt='Autre';
		}
	}
	else{
		header('location:../typetr.php?errno=1');
		exit();
	}
	mysqli_free_result($result);

	if(!isset($_SESSION['sesscomptage'])){

		$req2="SELECT * FROM comptagetr ORDER BY id DESC LIMIT 1";
		$result2=$mysqli->query($req2);
		if ($result2 === FALSE) {
			echo "Error selecting record: " . $mysqli->error;
			$mysqli->close();
			exit();
		}

		$nbrrow2=mysqli_num_rows($result2);

		if($nbrrow2==0){
			$req3="SELECT * FROM stockagetr ORDER BY id DESC LIMIT 1";

			$result3=$mysqli->query($req3);
			if ($result3 === FALSE) {
				echo "Error selecting record: " . $mysqli->error;
				$mysqli->close();
				exit();
			}

			$nbrrow3=mysqli_num_rows($result3);
			if($nbrrow3==0){
				$sessnbr=1;
			}
			else{
				while($data3=$result3->fetch_assoc())
				{
					$div=$data3['diverstr'];
				}
				$tabdiv=explode("-",$div);
				$sessnbr=intval($tabdiv[0])+1;
			}
		}

		if($nbrrow2!=0){
			while($data2=$result2->fetch_assoc())
			{
				$div=$data2['divers'];

			}
			$tabdiv=explode("-",$div);
			$sessnbr=intval($tabdiv[0]);
		}

		$_SESSION['sesscomptage']=$sessnbr;
	}
	else{
		$sessnbr=$_SESSION['sesscomptage'];
	}

	$datemyn=date("Y-m-d",strtotime($datemy));
	$req4="INSERT INTO comptagetr (datescan,numident,code,type,valeurf,divers) VALUES ('".$datemyn."','".$tktident."',".$typecde.",'".$typetkt."',".$valtkt.",'".$sessnbr."-')";

	$result4=$mysqli->query($req4);
	if ($result4 === FALSE) {
		echo "Error selecting record: " . $mysqli->error;
		$mysqli->close();
		exit();
	}
	mysqli_free_result($result4);
	$mysqli->close();
}
else{
	$mysqli->close();
}

header('location:../calctrpage.php');
exit;
?>