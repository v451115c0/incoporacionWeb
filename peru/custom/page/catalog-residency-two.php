<?php 

require_once('../../functions.php'); /*Funciones*/

@session_name("incorporacion");
@session_start();

/*NIKKEN CHALLENGE*/
	$residency_four_nc = "";

	if(isset($_SESSION["residency_four_nc"])){
		$residency_four_nc = $_SESSION["residency_four_nc"];
	}
/*NIKKEN CHALLENGE*/

/*vars*/
$country = $_GET["country"];
$value = $_GET["value"];
$value_one = $_GET["value_one"];
/*vars*/

?><option value="" selected>Distrito</option><?php

$queryResult = $pdo->prepare("SELECT DISTINCT colony_code, colony_name FROM nikkenla_marketing.control_states where pais = :country and province_code = :province_code and state_code = :state_code order by colony_name ASC");
$queryResult->execute(array(':country' => $country, ':province_code' => $value_one, ':state_code' => $value));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	?><option value="<?php echo $row['colony_code'] ?>" <?php if($residency_four_nc == $row['colony_name']){ echo "selected"; } ?>><?php echo $row['colony_name']; ?></option><?php
}

?>
