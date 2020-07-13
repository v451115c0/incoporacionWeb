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
if(isset($_SESSION["country_nc"])){
	$country = $_SESSION["country_nc"];
}
/*vars*/

$residency_two_value = "Departamento";

if($country == 1)
{
	$residency_two_value = "Departamento";
}
if($country == 2)
{
	$residency_two_value = "Estado";
}
if($country == 3)
{
	$residency_two_value = "Departamento";
}
if($country == 4)
{
	$residency_two_value = "Provincia";
}
if($country == 5)
{
	$residency_two_value = "Ciudad";
}
if($country == 6)
{
	$residency_two_value = "Departamento";
}
if($country == 7)
{
	$residency_two_value = "Departamento";
}
if($country == 8)
{
	$residency_two_value = "Provincia";
}

?><option value=""><?php echo $residency_two_value ?></option><?php

$queryResult = $pdo->prepare("SELECT code, name FROM citys where country = :country order by name ASC");
$queryResult->execute(array(':country' => $country));
while($row = $queryResult->fetch(PDO::FETCH_ASSOC))
{
	?><option value="<?php echo $row['code'] ?>" <?php if($row["code"] == $residency_two_nc){ echo "selected"; } ?>><?php echo mb_convert_case(mb_strtolower($row['name']), MB_CASE_TITLE, "UTF-8");; ?></option><?php
}

?>
