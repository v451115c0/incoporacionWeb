<?php 

require_once('../../functions.php'); /*Funciones*/

/*vars*/
$cp = $_GET["cp"];
$state = $_GET["state"];
$municipality = $_GET["municipality"];
/*vars*/


?><option value="" selected>Colonia</option><?php

$queryResult = $pdo->prepare("SELECT DISTINCT colony_code, colony_name FROM nikkenla_marketing.control_states where pais = 2 and province_code = :municipality and state_code = :state and postal_code = :cp order by colony_name ASC");
$queryResult->execute(array(':cp' => $cp, ':state' => $state, ':municipality' => $municipality));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	?><option value="<?php echo $row['colony_code'] ?>"><?php echo $row['colony_name']; ?></option><?php
}

?>
