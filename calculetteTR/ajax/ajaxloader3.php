<?php
$annee=$_POST['an'];
$mois=$_POST['month'];

include('../db/cnx.php');

$req="SELECT * FROM bordereau WHERE ";
if($annee!="none" && $mois!="none"){
	$req.="annee=".$annee." AND mois=".$mois;
}
else{
	if($annee!="none"){
		$req.="annee=".$annee;
	}
	else{
		$req.="mois=".$mois;
	}
}

$result=$mysqli->query($req);
if ($result === FALSE) {
	echo "Error selecting record: " . $mysqli->error;
	$mysqli->close();
	exit();
}

$nbrrow=mysqli_num_rows($result);

if($nbrrow==0){
	echo "<p style=\"color:#FFFFFF;\"> Pas de Borderaux d&eacute;pos&eacute; pour cette periode ...</p>";
}
else{
	echo "<p style=\"color:#FFFFFF;padding:0px;margin:0px;font-size:12px;\"><u>Bordereaux :</u></p>
		<ul>";

	while($data=mysqli_fetch_assoc($result)){
		$nbr_tick=$data['nbrticket'];
		$prixtot=$data['valeurtot'];

		$prixtot=number_format($data['valeurtot'],2,'.','');
		echo"

			<li>Nombre de Tickets Scann&eacute;s:&nbsp<Font size=\"3pt\" color=\"red\">&nbsp".$nbr_tick."</font>&nbsp le &nbsp<Font size=\"3pt\" color=\"#FFFFFF\">".$data['jour']."/".$data['mois']."/".$data['annee']."</font>&nbsp montant d&eacute;pos&eacute;:
			&nbsp<Font size=\"3pt\" color=\"red\">".$prixtot."&nbsp &euro;</font>&nbsp - <a href=\"visualisebord.php?j=".$data['jour']."&m=".$data['mois']."&a=".$data['annee']."&nbr=".$nbr_tick."&p=".$prixtot."\" target=\"_blank\"><strong>Visualiser</strong></a></li>";
	}
	echo "</ul>";
}//de else
mysqli_free_result($result);
$mysqli->close();
?>