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

$residency_one_value = "";
$residency_two_value = "Departamento";
$residency_three_value = "Provincia";
$residency_four_value = "Distrito";
$cellular_value = "Teléfono celular (9 dígitos)";

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
			<input type="text" name="telephone" class="form-control required input-cellular" onblur="Validate_cellular(this.value);" onkeypress="return JustNumbers(event);" <?php if($country == 3){ ?> maxlength="9" <?php }else{ ?> maxlength="15" <?php } ?> placeholder="<?php echo $cellular_value ?>" value="<?php echo $cellular_nc ?>">
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
						<select class="required input-residency-two" name="residency-two" id="residency-two" onchange="Catalog_residency_one(<?php echo $country ?>)"></select>
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
					<div class="styled-select">
						<select class="required input-residency-three" name="residency-three" id="residency-three" onchange="Catalog_residency_two(<?php echo $country ?>)"></select>
					</div>
				</div>
			</div>

			<!-- Traer catálogo de ciudades -->
			<script>Catalog_residency_one(<?php echo $country ?>);</script>
			<!-- Traer catálogo de ciudades -->
			<?php
		} 
		if($residency_four_value != "")
		{
			?>
			<div class="col-md-6">
				<div class="form-group">
					<div class="styled-select">
						<select class="required input-residency-four" name="residency-four" id="residency-four"></select>
					</div>
				</div>
			</div>

			<!-- Traer catálogo de ciudades -->
			<script>Catalog_residency_two(<?php echo $country ?>);</script>
			<!-- Traer catálogo de ciudades -->
			<?php
		} 
	?>
</div>