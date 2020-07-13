<?php 

require_once('../../functions.php'); /*Funciones*/

@session_name("incorporacion");
@session_start();

/*NIKKEN CHALLENGE*/
	$residency_two_nc = "";

	if(isset($_SESSION["residency_two_nc"])){
		$residency_two_nc = $_SESSION["residency_two_nc"];
	}
/*NIKKEN CHALLENGE*/

/*vars*/
$country = $_GET["country"];
$counter = 0;
/*vars*/

?><option value="">Departamento</option><?php

$queryResult = $pdo->prepare("SELECT DISTINCT state_code, state_name FROM nikkenla_marketing.control_states where pais = :country order by state_name ASC");
$queryResult->execute(array(':country' => $country));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	?><option value="<?php echo $row['state_code'] ?>" <?php if($row['state_name'] == ucfirst(strtolower((trim($residency_two_nc))))){ echo "selected"; $counter++; } ?>><?php echo $row['state_name']; ?></option><?php
}

if($counter > 0){
	?>
	<script>Catalog_residency_one(3);</script>
	<?php
}

?>
