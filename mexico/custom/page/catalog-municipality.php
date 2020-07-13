<?php 

require_once('../../functions.php'); /*Funciones*/

/*vars*/
$cp = $_GET["cp"];
$state = $_GET["state"];
/*vars*/


?><option value="" selected>Municipio</option><?php

$queryResult = $pdo->prepare("SELECT DISTINCT province_code, province_name FROM nikkenla_marketing.control_states where pais = 2 and state_code = :state and postal_code = :cp order by province_name ASC");
$queryResult->execute(array(':cp' => $cp, ':state' => $state));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	?><option value="<?php echo $row['province_code'] ?>"><?php echo $row['province_name']; ?></option><?php
}

?>
