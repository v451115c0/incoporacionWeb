<?php 

require_once('../../functions.php'); /*Funciones*/

/*vars*/
$country = $_GET["country"];
/*vars*/

?><option value="" selected>Tipo de cuenta</option><?php

$queryResult = $pdo->prepare("SELECT id_bank_type, name FROM nikkenla_office.control_banks_type where country = :country order by name ASC");
$queryResult->execute(array(':country' => $country));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	?><option value="<?php echo $row['id_bank_type'] ?>"><?php echo $row['name'] ?></option><?php
}

?>
