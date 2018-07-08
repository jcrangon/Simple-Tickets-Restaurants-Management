<?php
session_start();

$_SESSION['comptagecheck']=0;

include('db/cnx.php');
$req="SELECT DISTINCT annee FROM bordereau ORDER BY annee DESC";
$result=$mysqli->query($req);
if ($result === FALSE) {
	echo "Error deleting record: " . $mysqli->error;
	$mysqli->close();
	exit();
}
$nl=mysqli_num_rows($result);
if($nl==0){
	$tabannee[]=date("Y");
	$nbrligne=1;
}
else{
	while($data=$result->fetch_assoc()){
		$tabannee[]=$data['annee'];
	}
	$nbrligne=$nl;
}
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
<script type="text/javascript" src="./js/jq.js"></script>
<script type="text/javascript" src="./js/JQAjax.js"></script>
<script type="text/javascript" src="js/alertedel1.js"></script>
<script>
$(function() {
	$( "#datepicker1" ).datepicker({
		dateFormat : 'yy-mm-dd'
	});
});
$(function() {
	$( "#datepicker2" ).datepicker({
		dateFormat : 'yy-mm-dd'
	});
});
$(function() {
	$( "#datepicker3" ).datepicker({
		dateFormat : 'yy-mm-dd'
	});
});
</script>
</head>
<body>

<div class="container"> <!-- Container -->
<?php
include('header.php');
?>
<!-- -------------------------------------------------------------------------------------------------------------------- -->
<div class="content"> <!-- Content -->

	<div class="centerit">
		<div class="bordertitre">
		<h1>Recherche et Stats</h1>
		</div>
	</div>

	<div class="centerit">
		<div class="borderdiv" style="padding-bottom:2px;margin-bottom:0px;">
		<ul>
		<li><strong>Total Tickets &agrave; une Date...</strong> </li>
		<p><u>Date:</u> <input type="text" name="datepicker1" id="datepicker1"  style="margin-left:5px;" value="">
		<input type="button" id="submit1" value="Envoyer"/></p>

		<li><strong>Total Tickets entre deux dates...</strong></li>
		<p><u>Date debut:</u> <input type="text" name="datepicker2" id="datepicker2"  style="margin-left:5px;" value=""></p>
		<p><u>Date Fin:</u><input type="text" name="datepicker3" id="datepicker3"  style="margin-left:26px;" value="">
		<input type="button" id="submit2" value="Envoyer"/></p>
		</ul>
		</div> <!-- borderdiv -->

		<div class="borderdiv" style="margin-left:10px;">
		<h4>Recherche Bordereaux de d&eacute;p&ocirc;t</h4>
		<p>ANNEE :
			<select name="annee" id="annee">
			<option value="none" selected>--</option>
<?php
for($i=0;$i<$nbrligne;$i++){?>
			<option value="<?php echo $tabannee[$i]; ?>"><?php echo $tabannee[$i]; ?></option>
<?php
}
?>
			</select>
		<strong>ET / OU</strong>
		MOIS :
		<select name="mois" id="mois" value="">
		<option value="none" selected>--</option>
		<option value="1">Janvier</option>
		<option value="2">Fevrier</option>
		<option value="3">Mars</option>
		<option value="4">Avril</option>
		<option value="5">Mai</option>
		<option value="6">Juin</option>
		<option value="7">Juillet</option>
		<option value="8">Ao&ucirc;t</option>
		<option value="9">Septembre</option>
		<option value="10">Octobre</option>
		<option value="11">Novembre</option>
		<option value="12">Decembre</option>
		</select>
		<input type="button" id="submit3" value="Envoyer"/>
		</p>

		</div>

	</div> <!-- centerit -->

	<div class="borderdiv8" style="margin-left:5px;">
	<strong>Resultats de la Recherche:</strong>
	<div class="innerbox2" id="resultatrec" style="max-height:140px;">

	</div> <!-- innerbox2 -->
	</div> <!--  borderdiv4 -->



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