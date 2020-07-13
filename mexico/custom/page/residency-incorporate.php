<?php 

@session_name("incorporacion");
@session_start();

/*NIKKEN CHALLENGE*/
	$email_nc = "";
	$cellular_nc = "";
	$gender_nc = "";

	if(isset($_SESSION["email_nc"])){
		$email_nc = $_SESSION["email_nc"];
	}

	if(isset($_SESSION["cellular_nc"])){
		$cellular_nc = $_SESSION["cellular_nc"];
	}

	if(isset($_SESSION["gender_nc"])){
		$gender_nc = $_SESSION["gender_nc"];
	}
/*NIKKEN CHALLENGE*/

/*vars*/
$country = $_POST["country"];
/*vars*/

$cellular_value = "Teléfono celular (10 dígitos)";

?>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="email" name="email" onblur="Validate_email(this.value);" class="form-control required input-email" id="email-incorporate" maxlength="80" value="<?php echo $email_nc ?>" placeholder="Correo electrónico">
			<input type="hidden" class="form-control required" id="validator-email" value="<?php if($email_nc != ""){ echo "1"; } ?>">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" name="telephone" class="form-control required input-cellular" onkeypress="return JustNumbers(event);" <?php if($country == 3){ ?> maxlength="9" <?php }else{ ?> maxlength="15" <?php } ?> placeholder="<?php echo $cellular_value ?>" value="<?php echo $cellular_nc ?>">
		</div>
	</div>
</div>

<div class="row">
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