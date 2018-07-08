<?php
session_start();

include('db/cnx.php');
$req="SELECT * FROM comptagetr";

$result=$mysqli->query($req);
if ($result === FALSE) {
	echo "Error deleting record: " . $mysqli->error;
	$mysqli->close();
	exit();
}

$nbrrow=mysqli_num_rows($result);
if($nbrrow!=0 && $_SESSION['comptagecheck']==0){
	$loadalert='onload="sessioncheck();"';
}
else{
	$loadalert='';
}

//---------------------------------------------
$totticket=0;
if($nbrrow!=0){
	while($data=$result->fetch_assoc())
	{
		$totticket+=$data['valeurf'];
	}
}
$totticket=number_format($totticket,2,'.','');

//--------------------------------------------
$datefr='';
if($nbrrow!=0){
$req2="SELECT * FROM comptagetr ORDER BY ID DESC LIMIT 1";

$result2=$mysqli->query($req2);
if ($result2 === FALSE) {
	echo "Error deleting record: " . $mysqli->error;
	$mysqli->close();
	exit();
}


$ligne=mysqli_fetch_array($result2,MYSQLI_ASSOC);
$date=$ligne['datescan'];

//$tab = explode("-",$date);
//$datefr = $tab[2]."/".$tab[1]."/".$tab[0];
$datefr=$date;
mysqli_free_result($result2);
}

//--------------------------------------------------
$totdate=0;
$tktjour=0;
if($nbrrow!=0){
$req3="SELECT * FROM comptagetr WHERE datescan='".$date."'";
	$result3=$mysqli->query($req3);
	if ($result3 === FALSE) {
		echo "Error deleting record: " . $mysqli->error;
		$mysqli->close();
		exit();
	}
	$tktjour=mysqli_num_rows($result3);

	while($data=$result3->fetch_assoc())
	{
		$totdate+=$data['valeurf'];
	}

}
$totdate=number_format($totdate,2,'.','');

$_SESSION['comptagecheck']=1;
$_SESSION['totticket']=$totticket;
$_SESSION['nbrticket']=$nbrrow;

mysqli_free_result($result);

$mysqli->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>

<!-- Metatags -->
<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
<?php
include('Meta/metatags.php');
?>

<!-- Favicon -->
<link rel="icon" type="image/png" href="pics/favicon.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="pics/favicon.ico" /><![endif]-->

<!-- Feuilles de Styles -->
<link rel="stylesheet" href="CSS/Style1.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="./js/jquery-ui-themes-1.11.2/themes/smoothness/jquery-ui.css">
<!-- Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script>
	!window.jQuery && document.write('<script src="js\/jquery-1.4.3.min.js"><\/script>');
</script>
<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="./js/fancybox_action.js"></script>
<script type="text/javascript" src="./js/jquery-ui-1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="./js/alertedel1.js"></script>
<script type="text/javascript" src="./js/jq.js"></script>
<script>
$(function() {
	$( "#datepicker" ).datepicker({
		dateFormat : 'yy-mm-dd'
	});
});
</script>


</head>
<body <?php echo $loadalert; ?>>

<div class="container"> <!-- Container -->
<?php
include('header.php');
?>
<!-- -------------------------------------------------------------------------------------------------------------------- -->
<div class="content"> <!-- Content -->

	<div class="centerit">
		<div class="bordertitre">
		<h1>Calculatrice TR</h1>
		</div>
	</div>

	<div class="centerit">
		<div class="borderdiv2">
			<form name="codebarreintput" action="phpfunct/codebarreprocess.php" method="post">
			<p>Date: <input type="text" name="datepicke" id="datepicker" style="margin-right:100px;" value="<?php echo $datefr;?>">

			Nbre de Tickets:
			<input type="text" style="width:60px;" value="<?php echo $tktjour.' / '.$nbrrow ?>" disabled/></p>

				<div style="text-align:center; padding:26px;">
				<p>
				Code SCAN:
				<input name="codeb" id="cdebarre" onkeyup="monitorscan();" type="text" Value=""/>
				</p>
				</div>

			</form>
			</div> <!-- borderdiv -->

		<div class="borderdiv3" style="margin-left:10px;">
			<strong>TOTAL DATE:</strong>
			<p class="total" id="totaldate">
			<?php echo $totdate; ?>
			</p>
			<strong>TOTAL SESSION:</strong>
			<p class="totalred" id="totaldate">
			<?php echo $totticket; ?>
			</p>
		</div> <!-- borderdiv -->

	</div> <!-- centerit -->

	<div class="borderdiv4" style="margin-left:20px;">
	<u>Tickets:</u>
	<div class="innerbox2">
		<table>
			<tr>
				<td><u>Date</u></td>
				<td><u>Numero</u></td>
				<td><u>Code</u></td>
				<td><u>Type</u></td>
				<td><u>Valeur &euro;</u></td>
				<td><u>Supprimer</u></td>
			</tr>
<?php
include('db/cnx.php');
$req="SELECT * FROM comptagetr ORDER BY id DESC";

$result=$mysqli->query($req);
if ($result === FALSE) {
	echo "Error deleting record: " . $mysqli->error;
	$mysqli->close();
	exit();
}

while($ref=$result->fetch_assoc())
{
?>
	<tr>
		<td><?php echo $ref['datescan'];?></td>
		<td><?php echo $ref['numident'];?></td>
		<td><?php echo $ref['code'];?></td>
		<td><?php echo $ref['type'];?></td>
		<td><?php echo $ref['valeurf'];?></td>
		<td><a href="#" onclick="delcomptage(<?php echo $ref['ID'];?>,0);" ><img src="pics/Supprimer X.png"/></a></td>
	</tr>
<?php
}
mysqli_free_result($result);
$mysqli->close();
?>

		</table>

	</div> <!-- innerbox2 -->
	</div> <!-- borderdiv -->

	<div class="borderdiv5">
	<div class="borderdiv6">
	<input type="button" onclick="alertstock(<?php echo $nbrrow ?>);" value="Valider la Session">
	</div><!-- borderdiv6 -->
	</div><!-- borderdiv5 -->


	<div style="display: none;"> <!-- SPLASH A PROPOS -->
		<div id="inline1" class="splash">
		</div>
	</div>
<!-- ---------------------------------------------- -->

</div> <!-- End Content -->
<!-- -------------------------------------------------------------------------------------------------------------------- -->

<?php
include('sidebarright.php');
?>
</div> <!-- End Container -->
<?php
include('footer.php');
?>
</body>
</html>