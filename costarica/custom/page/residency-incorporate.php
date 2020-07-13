<?php 

@session_name("incorporacion");
@session_start();

/*NIKKEN CHALLENGE*/
	$email_nc = "";
	$cellular_nc = "";
	$residency_one_nc = "";
	$residency_three_nc = "";
	$residency_four_nc = "";
	$gender_nc = "";

	if(isset($_SESSION["email_nc"])){
		$email_nc = $_SESSION["email_nc"];
	}

	if(isset($_SESSION["cellular_nc"])){
		$cellular_nc = $_SESSION["cellular_nc"];
	}

	if(isset($_SESSION["residency_one_nc"])){
		$residency_one_nc = $_SESSION["residency_one_nc"];
	}

	if(isset($_SESSION["residency_three_nc"])){
		$residency_three_nc = $_SESSION["residency_three_nc"];
	}

	if(isset($_SESSION["residency_four_nc"])){
		$residency_four_nc = $_SESSION["residency_four_nc"];
	}

	if(isset($_SESSION["gender_nc"])){
		$gender_nc = $_SESSION["gender_nc"];
	}
/*NIKKEN CHALLENGE*/

/*vars*/
$country = $_POST["country"];
/*vars*/
/* *** SE MODIFICO POR DEFAULT AL PAIS NUEMRO 8  *** */
$country = 8;

$residency_one_value = "";
$residency_two_value = "Departamento";
$residency_three_value = "Ciudad";
$residency_four_value = "";
$cellular_value = "Teléfono celular";



//echo $country;

if($country == 1)
{
	$residency_one_value = "";
	$residency_two_value = "Departamento";
	$residency_three_value = "Ciudad";
	$residency_four_value = "";
}
if($country == 2)
{
	$residency_one_value = "Código postal";
	$residency_two_value = "Estado";
	$residency_three_value = "Municipio";
	$residency_four_value = "Colonia";
	$cellular_value = "Teléfono celular (10 dígitos)";
}
if($country == 3)
{
	$residency_one_value = "";
	$residency_two_value = "Departamento";
	$residency_three_value = "Provincia";
	$residency_four_value = "";
	$cellular_value = "Teléfono celular (9 dígitos)";
}
if($country == 4)
{
	$residency_one_value = "";
	$residency_two_value = "Provincia";
	$residency_three_value = "Ciudad";
	$residency_four_value = "";
}
if($country == 5)
{
	$residency_one_value = "";
	$residency_two_value = "Ciudad";
	$residency_three_value = "Provincia";
	$residency_four_value = "";
}
if($country == 6)
{
	$residency_one_value = "";
	$residency_two_value = "Departamento";
	$residency_three_value = "Ciudad";
	$residency_four_value = "Municipio";
}
if($country == 7)
{
	$residency_one_value = "";
	$residency_two_value = "Departamento";
	$residency_three_value = "Ciudad";
	$residency_four_value = "";
}
if($country == 8)
{
	$residency_one_value = "";
	$residency_two_value = "Provincia";
	$residency_three_value = "Cantón";
	$residency_four_value = "";
}

?>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="email" name="email" onblur="Validate_email(this.value);" class="form-control required input-email" id="email-incorporate" maxlength="80" placeholder="Correo electrónico" value="<?php echo $email_nc ?>">
			<input type="hidden" class="form-control required" id="validator-email" value="<?php if($email_nc != ""){ echo "1"; } ?>">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<div class="styled-select">
				<select class="required input-gender" name="gender" id="gender" onchange="getDataShirt()">
					<option value="">Genero</option>
					<option value="M" <?php if($gender_nc == "M"){ echo "selected"; } ?>>Masculino</option>
					<option value="F" <?php if($gender_nc == "F"){ echo "selected"; } ?>>Femenino</option>
				</select>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" name="telephone" class="form-control required input-cellular" onkeypress="return JustNumbers(event,$(this).val());" <?php if($country == 3){ ?> maxlength="9" <?php }elseif($country == 8){ ?> maxlength="8" minlength="8"<?php }else{ ?> maxlength="15" <?php } ?> placeholder="<?php echo $cellular_value ?>" value="<?php echo $cellular_nc ?>">
		</div>
	</div>

	<?php 
		if($residency_one_value != "")
		{
			?>
			<div class="col-md-6" >
				<div class="form-group">
					<input type="text" name="residency-one" class="form-control required input-residency-one" maxlength="49" placeholder="<?php echo $residency_one_value ?>" value="<?php echo $residency_one_nc ?>">
				</div>
			</div>
			<?php
		} 
		if($residency_two_value != "")
		{
			?>
			<div class="col-md-6">
				<div class="form-group">
					<div class="styled-select">
						<select class="required input-residency-two" name="residency-two" id="residency-two"></select>
					</div>
				</div>
			</div>
			
			<!-- Traer catálogo de ciudades -->
			<script>Catalog_residency(<?php echo $country ?>);</script>
			<!-- Traer catálogo de ciudades -->
			<?php
		} 
		if($residency_three_value != "")
		{
			?>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="residency-three" class="form-control required input-residency-three" maxlength="49" placeholder="<?php echo $residency_three_value ?>" value="<?php echo $residency_three_nc ?>">
				</div>
			</div>
			<?php
		} 
		if($residency_four_value != "")
		{
			?>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="residency-four" class="form-control required input-residency-four" maxlength="49" placeholder="<?php echo $residency_four_value ?>" value="<?php echo $residency_four_nc ?>">
				</div>
			</div>
			<?php
		} 
	?>
</div>