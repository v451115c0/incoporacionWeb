<?php 

require_once('../../functions.php'); /*Funciones*/

/*vars*/
$country = $_POST["country"];
$type = $_POST["type"];
/*vars*/

$queryResult = $pdo->prepare("SELECT content FROM terms where country = :country and type = :type");
$queryResult->execute(array(':country' => $country, ':type' => $type));
$done = $queryResult->fetch();
if($done)
{
	echo $done['content'];
}

?>