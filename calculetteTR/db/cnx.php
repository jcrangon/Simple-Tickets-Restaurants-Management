<?php
$serveur = "localhost";
$base = "**DB_name**";
$user = "**DB_user**";
$pass = "**DB_user_password**";


$mysqli = new mysqli($serveur, $user, $pass, $base);

$mysqli->set_charset("utf8");

if ($mysqli->connect_error) {
	die('Erreur de connexion ('.$mysqli->connect_errno.')'. $mysqli->connect_error);
}
?>