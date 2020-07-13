<?php 

require_once('../../functions.php'); /*Funciones*/

@session_name("incorporacion");
@session_start();

/*NIKKEN CHALLENGE*/
	$type_document_nc = "";

	if(isset($_SESSION["type_document_nc"])){
		$type_document_nc = $_SESSION["type_document_nc"];
	}
/*NIKKEN CHALLENGE*/

/*vars*/
$type = $_GET["type"];
$country = $_GET["country"];
$type_incorporate = $_GET["type_incorporate"];
/*vars*/

$type_document_value = "Tipo de documento";

if($type_incorporate == 0)
{
	$type_document_value = "Tipo de Régimen";
}

?><option value="" selected><?php echo $type_document_value ?></option><?php

$queryResult = $pdo->prepare("SELECT id_type, name FROM type_documents where type = :type and country = :country order by name ASC");
$queryResult->execute(array(':type' => $type_incorporate, ':country' => $country));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	$name = trim($row['name']);
	if($name == "IFE"){ $name = "Credencial para votar (INE)"; }
	?><option value="<?php echo $row['id_type'] ?>" <?php if($type_document_nc == $row['id_type']){ echo "selected"; } ?>><?php echo $name ?></option><?php
}

?>
