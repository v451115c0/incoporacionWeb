<?php 

@session_name("incorporacion");
@session_start();

/*NIKKEN CHALLENGE*/
	$type_incorporate_nc = "";

	if(isset($_SESSION["type_incorporate_nc"])){
		$type_incorporate_nc = $_SESSION["type_incorporate_nc"];
	}
/*NIKKEN CHALLENGE*/

/*vars*/
$country = $_GET["country"];
/*vars*/

$name_person_value = "Persona natural";
$name_company_value = "Empresa";
$name_company_bussiness_value = "";

if($country == 1)
{
	$name_person_value = "Persona natural";
	$name_company_value = "Empresa";
}
if($country == 2)
{
	$name_person_value = "Persona física";
	$name_company_value = "Persona moral";
}
if($country == 3)
{
	$name_person_value = "Persona natural";
	$name_company_bussiness_value = "Persona natural con negocio";
	$name_company_value = "Empresa";
}
if($country == 4)
{
	$name_person_value = "Persona natural";
	$name_company_value = "Empresa";
}
if($country == 5)
{
	$name_person_value = "Persona natural";
	$name_company_value = "Persona jurídica";
}
if($country == 6)
{
	$name_person_value = "Persona individual";
	$name_company_value = "Empresa";
}
if($country == 7)
{
	$name_person_value = "Persona natural";
	$name_company_value = "Empresa";
}
if($country == 8)
{
	$name_person_value = "Persona física";
	$name_company_value = "Empresa";
}

?>

<option value="">Selecciona una opción</option>
<option value="1" <?php if($type_incorporate_nc == "1"){ echo "selected"; } ?>><?php echo $name_person_value ?></option>
<?php if($name_company_bussiness_value != ""){ ?><option value="2" <?php if($type_incorporate_nc == "2"){ echo "selected"; } ?>><?php echo $name_company_bussiness_value ?></option><?php } ?>
<option value="0" <?php if($type_incorporate_nc == "0"){ echo "selected"; } ?>><?php echo $name_company_value ?></option>