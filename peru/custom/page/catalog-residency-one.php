<?php 

require_once('../../functions.php'); /*Funciones*/

@session_name("incorporacion");
@session_start();

/*NIKKEN CHALLENGE*/
	$residency_three_nc = "";

	if(isset($_SESSION["residency_three_nc"])){
		$residency_three_nc = $_SESSION["residency_three_nc"];
	}
/*NIKKEN CHALLENGE*/

/*vars*/
$country = $_GET["country"];
$value = $_GET["value"];
$counter = 0;
/*vars*/

?><option value="">Provincia</option><?php

$queryResult = $pdo->prepare("SELECT DISTINCT province_code, province_name FROM nikkenla_marketing.control_states where pais = :country and state_code = :state_code order by province_name ASC");
$queryResult->execute(array(':country' => $country, ':state_code' => $value));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	?><option value="<?php echo $row['province_code'] ?>" <?php if($residency_three_nc == $row['province_code']){ echo "selected"; $counter++; } ?>><?php echo $row['province_name']; ?></option><?php
}

if($counter > 0){
	?>
	<script>Catalog_residency_two(3);</script>
	<?php
}


?>
