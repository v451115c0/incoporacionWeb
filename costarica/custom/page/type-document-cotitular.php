<?php 

require_once('../../functions.php'); /*Funciones*/

/*vars*/
$type = $_GET["type"];
$country = $_GET["country"];
$type_incorporate = $_GET["type_incorporate"];
/*vars*/

?><option value="" selected>Tipo de documento</option><?php

$queryResult = $pdo->prepare("SELECT id_type, name FROM type_documents where type = :type and country = :country order by name ASC");
$queryResult->execute(array(':type' => $type_incorporate, ':country' => $country));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	?><option value="<?php echo $row['id_type'] ?>"><?php echo $row['name'] ?></option><?php
}

?>
