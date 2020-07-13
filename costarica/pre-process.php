<?php 

date_default_timezone_set("America/Bogota");
session_name("incorporacion");
session_start();

if(isset($_GET["ident"]))
{
	$_SESSION["sponsor"] = base64_decode($_GET["ident"]);
}

/*Redireccionar*/
header('location: index.html');
exit;

?>