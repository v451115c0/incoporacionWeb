<?php 

require_once('../../functions.php'); /*Funciones*/

/*vars*/
$cp = $_GET["cp"];
/*vars*/


?><option value="" selected>Estado</option><?php

$queryResult = $pdo->prepare("SELECT DISTINCT state_code, state_name FROM nikkenla_marketing.control_states where pais = 2 and postal_code = :cp order by state_name ASC");
$queryResult->execute(array(':cp' => $cp));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	?><option value="<?php echo $row['state_code'] ?>"><?php echo $row['state_name']; ?></option><?php
}

?>
