<?php
require_once("models/login_model.php");

$nb=$_POST["nombre"];
$pass=$_POST["contra"];
$err=datosVacios($nb,$pass);
compruebaLogin($nb,$pass,$err);

require_once("views/login_vista.php");
?>