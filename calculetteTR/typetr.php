<?php
session_start();

$_SESSION['comptagecheck']=0;
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

<!-- Javascript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script>
	!window.jQuery && document.write('<script src="js\/jquery-1.4.3.min.js"><\/script>');
</script>
<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="./js/fancybox_action.js"></script>
<script type="text/javascript" src="./js/alertedel1.js"></script>

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
		<h1>G&eacute;rer les types de Titres</h1>
		</div>
	</div>
<?php
if(isset($_GET['errno'])){
	echo '<p style="color:#FF0000;">Vous devez creer les codes et les types de ticket avant de les scanner!!</p>';
	unset($_GET['errno']);
}
?>
	<div class="centerit">
		<div class="borderdiv">
		<h4>Types Actuellement stock&eacute;s dans la base de donn&eacute;es:</h4>
			<div class="innerbox">
				<p align="justify">
				<table>
				<tr>
					<td><u>Code</u></td>
					<td style="padding-left:10px;"><u>Type</u></td>
					<td style="padding-left:10px;"><u>Supprimer</u></td>
				</tr>
<?php
include('db/cnx.php');

$req="SELECT * FROM trtype";
$res=$mysqli->query($req);
while($data2=$res->fetch_assoc())
{
	?>
	<tr>
		<td><?php echo $data2['CodeType'];?></td>
		<td style="padding-left:10px;"><?php echo $data2['typeTicket'];?></td>
		<?php if ($data2['CodeType']!=99) {?>
		<td style="padding-left:10px;"><a href="#" onclick="delentree(<?php echo $data2['CodeType'];?>);" ><img src="pics/Supprimer X.png"/></a></td>
		<?php } ?>
	</tr>
<?php
$tabcode[]=$data2['CodeType'];
}
mysqli_free_result($res);
$mysqli->close();
$comma_separated = implode('|', $tabcode);
?>
				</table>
				</p>
			</div> <!-- innerbox scrollable-->
		</div> <!-- borderdiv -->

		<div class="borderdiv" style="margin-left:10px;">
		<h4>Enregistrer un Nouveau Type</h4>
		<p align="justify">
		Inserez dans les champs ci-dessous le <strong>code</strong> et le <strong>type de ticket</strong> &agrave; enregistrer...
		</p>

		<form name="codenter" action="phpfunct/insertnewtype.php" method="post" style="padding-left:15px;">
		Code:
		<input type="text" name="code" maxlength="1" style="padding-left:5px;color:#FFFFFF;width:20px;background-color:#696969;border:solid 1px #77A1F9;border-radius:20px;"/>
		<br/><br/>
		Type de Ticket:
		<input type="text" name="typeticket" maxlenght="20" style="padding-left:5px;color:#FFFFFF;background-color:#696969; border:solid 1px #77A1F9;border-radius:20px;"/>
		<br/><br/>
		<input type="button" name="soumettre" value="Envoi" onclick="validate1(<?php echo '\'' . $comma_separated . '\''; ?>);" style="color:#77A1F9;background-color:#29282B; border:solid 1px #77A1F9;border-radius:20px;"/>
		</form>

		</div>

	</div> <!-- centerit -->



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