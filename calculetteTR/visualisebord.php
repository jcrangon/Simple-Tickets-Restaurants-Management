<?php
session_start();

$_SESSION['comptagecheck']=0;
$totticket=floatval($_GET['p']);
$nbrrow=intval($_GET['nbr']);
$totticket=number_format($totticket,2,'.','');
$j=$_GET['j'];
$m=$_GET['m'];
$y=$_GET['a'];
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

</head>
<body>

<div class="container"> <!-- Container -->
<?php
include('header.php');
?>
<!-- -------------------------------------------------------------------------------------------------------------------- -->
<div class="content"> <!-- Content -->

	<div class="crt">
	<p style="margin:0px;color:#FF0000;position:relative;top:50px;left:65px;">
	<?php echo $nbrrow; ?>
	</p>

	<p style="margin:0px;color:#FF0000;position:relative;top:55px;left:65px;">
	<?php echo $totticket; ?>
	</p>

	<p style="margin:0px;color:#FF0000;position:relative;top:65px;left:385px;">
	<?php echo $j; ?>
	</p>

	<p style="margin:0px;color:#FF0000;position:relative;top:48px;left:423px;">
	<?php echo $m; ?>
	</p>

	<p style="margin:0px;color:#FF0000;position:relative;top:30px;left:460px;">
	<?php echo $y; ?>
	</p>

	<p style="margin:0px;color:#FF0000;position:relative;top:123px;left:360px;">
	<?php echo $nbrrow; ?>
	</p>

	<p style="margin:0px;color:#FF0000;position:relative;top:107px;left:527px;">
	<?php echo $totticket; ?>
	</p>
	</div> <!-- crt -->
<!--
	<div class="borderdiv7">
	<div class="borderdiv6">
	<a href="./mainboard.php" target="_self" style="color:#FFFFFF;">Retour &agrave; l'Accueil</a>
	</div>
	</div>
-->

	<div style="display: none;">
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