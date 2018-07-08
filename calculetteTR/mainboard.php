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

</head>
<body>

<div class="container"> <!-- Container -->
<?php
include('header.php');
?>
<!-- -------------------------------------------------------------------------------------------------------------------- -->
<div class="content"> <!-- Content -->

	<div class="welcome">
	<h1>Bienvenue sur TR PROCESS !!</h1>
	<p align="justify">
	Avec cet outil vous pourrez creer et maintenir &agrave; jour une liste de Tickets restaurants
	r&eacute;pertori&eacute;s par type.<br/><br/>
	Vous pourrez egalement effectuer Totaliser le montant journalier de
	vos TR en utilisant la douchette pr&eacute;vue a cet effet.<br/><br/>
	Vous pourrez enfin rechercher les montants enregistr&eacute;s entre deux dates ainsi que de multiples
	recherche au sein de nos bases de donn&eacute;es.<br/><br/>
	Pour commencer, choisissez une action parmis celles propos&eacute;es dans le menu de droite.
	</p>

	</div>


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