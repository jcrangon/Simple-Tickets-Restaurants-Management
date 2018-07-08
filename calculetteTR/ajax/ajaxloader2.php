<?php
$daterech1=$_POST['datesearch2'];
$daterech2=$_POST['datesearch3'];

include('../db/cnx.php');

$daterech1=date("Y-m-d",strtotime($daterech1));
$daterech2=date("Y-m-d",strtotime($daterech2));

$req="SELECT * FROM stockagetr WHERE datef BETWEEN '".$daterech1."' AND '".$daterech2."'";
$req2="SELECT * FROM stockagetr WHERE codef=1 AND datef BETWEEN '".$daterech1."' AND '".$daterech2."'";
$req3="SELECT * FROM stockagetr WHERE codef=2 AND datef BETWEEN '".$daterech1."' AND '".$daterech2."'";
$req4="SELECT * FROM stockagetr WHERE codef=3 AND datef BETWEEN '".$daterech1."' AND '".$daterech2."'";
$req5="SELECT * FROM stockagetr WHERE codef=4 AND datef BETWEEN '".$daterech1."' AND '".$daterech2."'";

$result=$mysqli->query($req);
if ($result === FALSE) {
	echo "Error selecting record: " . $mysqli->error;
	$mysqli->close();
	exit();
}

$nbrrow=mysqli_num_rows($result);

if($nbrrow==0){
	echo "<p style=\"color:#FFFFFF;\"> Pas d'enregistrements &agrave; cette date ...</p>";
}
else{
	$nbr_tick=0;
	$prixtot=0;


	while($data=mysqli_fetch_assoc($result)){
		$nbr_tick+=1;
		$prixtot+=$data['valeurfac'];
	}
	$prixtot=number_format($prixtot,2);
	echo"
		<p style=\"color:#FFFFFF;padding:0px;margin:0px;font-size:12px;\"><u>TOTAUX</u></p>
		<ul>
		<li>Nombre Scann&eacute;:<Font size=\"3pt\" color=\"red\">&nbsp".$nbr_tick."</font></li>
		<li>Montant:<Font size=\"3pt\" color=\"red\">&nbsp".$prixtot."&nbsp&euro;</font></li>
		</ul> Dont:";

	$nbr_tick=0;
	$prixtot=0;

	$result=$mysqli->query($req2);
	if ($result === FALSE) {
		echo "Error selecting record: " . $mysqli->error;
		$mysqli->close();
		exit();
	}
	$nbrow=mysqli_num_rows($result);
	if($nbrow!=0){
		while($data=mysqli_fetch_assoc($result)){
			$nbr_tick+=1;
			$prixtot+=$data['valeurfac'];
		}
		$prixtot=number_format($prixtot,2);
		echo"
		<p style=\"color:#FFFFFF;padding:0px;margin:0px;font-size:12px;\">CHEQUES DEJEUNER</p>
		<ul>
		<li>Nombre Scann&eacute;:<Font size=\"3pt\" color=\"red\">&nbsp".$nbr_tick."</font></li>
		<li>Montant:<Font size=\"3pt\" color=\"red\">&nbsp".$prixtot."&nbsp&euro;</font></li>
		</ul>";
	}

	$nbr_tick=0;
	$prixtot=0;

	$result=$mysqli->query($req3);
	if ($result === FALSE) {
		echo "Error selecting record: " . $mysqli->error;
		$mysqli->close();
		exit();
	}
	$nbrow=mysqli_num_rows($result);
	if($nbrow!=0){
		while($data=mysqli_fetch_assoc($result)){
			$nbr_tick+=1;
			$prixtot+=$data['valeurfac'];
		}
		$prixtot=number_format($prixtot,2);
		echo"
		<p style=\"color:#FFFFFF;padding:0px;margin:0px;font-size:12px;\">TICKETS RESTAURANT</p>
		<ul>
		<li>Nombre Scann&eacute;:<Font size=\"3pt\" color=\"red\">&nbsp".$nbr_tick."</font></li>
		<li>Montant:<Font size=\"3pt\" color=\"red\">&nbsp".$prixtot."&nbsp&euro;</font></li>
		</ul>";
	}

	$nbr_tick=0;
	$prixtot=0;

	$result=$mysqli->query($req4);
	if ($result === FALSE) {
		echo "Error selecting record: " . $mysqli->error;
		$mysqli->close();
		exit();
	}
	$nbrow=mysqli_num_rows($result);
	if($nbrow!=0){
		while($data=mysqli_fetch_assoc($result)){
			$nbr_tick+=1;
			$prixtot+=$data['valeurfac'];
		}
		$prixtot=number_format($prixtot,2);
		echo"
		<p style=\"color:#FFFFFF;padding:0px;margin:0px;font-size:12px;\">CHEQUES DE TABLE</p>
		<ul>
		<li>Nombre Scann&eacute;:<Font size=\"3pt\" color=\"red\">&nbsp".$nbr_tick."</font></li>
		<li>Montant:<Font size=\"3pt\" color=\"red\">&nbsp".$prixtot."&nbsp&euro;</font></li>
		</ul>";
	}

	$nbr_tick=0;
	$prixtot=0;

	$result=$mysqli->query($req5);
	if ($result === FALSE) {
		echo "Error selecting record: " . $mysqli->error;
		$mysqli->close();
		exit();
	}
	$nbrow=mysqli_num_rows($result);
	if($nbrow!=0){
		while($data=mysqli_fetch_assoc($result)){
			$nbr_tick+=1;
			$prixtot+=$data['valeurfac'];
		}
		$prixtot=number_format($prixtot,2);
		echo"
		<p style=\"color:#FFFFFF;padding:0px;margin:0px;font-size:12px;\">CHEQUES RESTAURANTS</p>
		<ul>
		<li>Nombre Scann&eacute;:<Font size=\"3pt\" color=\"red\">&nbsp".$nbr_tick."</font></li>
		<li>Montant:<Font size=\"3pt\" color=\"red\">&nbsp".$prixtot."&nbsp&euro;</font></li>
		</ul>";
	}

	echo"
	<table>
		<tr>
			<td><u>Date</u></td>
			<td><u>Numero</u></td>
			<td><u>Code</u></td>
			<td><u>Type</u></td>
			<td><u>Valeur &euro;</u></td>
			<td><u>Supprimer</u></td>
		</tr>";

		$result=$mysqli->query($req);
		if ($result === FALSE) {
			echo "Error selecting record: " . $mysqli->error;
			$mysqli->close();
			exit();
		}
		while($data2=mysqli_fetch_assoc($result)){
			echo"
			<tr>
				<td>".$data2['datef']."</td>
				<td>".$data2['ident']."</td>
				<td>".$data2['codef']."</td>
				<td>".$data2['typef']."</td>
				<td>".$data2['valeurfac']."</td>
				<td><a href=\"#\" onclick=\"delcomptage(".$data2['ID'].",1);\"><img src=\"pics/Supprimer X.png\"/></a></td>
			</tr>";
		} //de while
		echo"</table>";
}//de else
mysqli_free_result($result);
$mysqli->close();
?>