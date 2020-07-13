<?php 

@session_name("incorporacion");
@session_start();

/*NIKKEN CHALLENGE*/
	$number_document_nc = "";
	$rfc_nc = "";
	$address_nc = "";
	$name_legal_representative_nc = "";

	if(isset($_SESSION["number_document_nc"])){
		$number_document_nc = $_SESSION["number_document_nc"];
	}

	if(isset($_SESSION["rfc_nc"])){
		$rfc_nc = $_SESSION["rfc_nc"];
	}

	if(isset($_SESSION["address_nc"])){
		$address_nc = $_SESSION["address_nc"];
	}

	if(isset($_SESSION["name_legal_representative_nc"])){
		$name_legal_representative_nc = $_SESSION["name_legal_representative_nc"];
	}

	$type_incorporate_nc = "";

	if(isset($_SESSION["type_incorporate_nc"])){
		$type_incorporate_nc = $_SESSION["type_incorporate_nc"];
	}
/*NIKKEN CHALLENGE*/

/*vars*/
$country = $_POST["country"];
$type = $_POST["type"];
$type_incorporate = $_POST["type_incorporate"];
if($type_incorporate_nc != ""){ $type_incorporate = $type_incorporate_nc; }
/*vars*/

$number_document_value = "Número de documento";
$legal_representative_name_value = "Apellidos y nombres completos del representante legal";
$address_value = "Dirección de residencia";

if($type_incorporate == 0)
{
	$number_document_value = "Número de Identificación";
}

?>

<div class="row">
	<?php 

	$columns = "6";

	if($type_incorporate == 0 && $country == 2) /*Solo para empresas méxico*/
	{
		$columns = "12";
	}
	else
	{
		?>
		<div class="col-md-<?php echo $columns ?>">
			<div class="form-group">
				<div class="styled-select">
					<select class="required input-type-document" name="type-document" id="type-document" onchange="Validate_type_document(this.value);"></select>
				</div>
			</div>
		</div>

		<!-- Cargar tipos de documento -->
		<script>Type_document('<?php echo $country ?>', '<?php echo $type ?>', '<?php echo $type_incorporate ?>');</script>
		<!-- Cargar tipos de documento -->
		<?php
	}

	?>
	
	<div class="col-md-<?php echo $columns ?>">
		<div class="form-group">
			<input type="text" id="number-document-one" name="number-document" onblur="Validate_dni(this.value);" onkeypress="javascript: return Disabled_space(event,this)" maxlength="40" class="form-control required input-number-document" placeholder="<?php echo $number_document_value ?>" value="<?php echo $number_document_nc ?>">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<input type="text" name="address" id="address" class="form-control required input-address" placeholder="<?php echo $address_value ?>" value="<?php echo $address_nc ?>">
		</div>
	</div>
</div>

<?php 

if($type_incorporate == 0) /*Solo para empresas*/
{
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<input type="text" name="name-legal-representative" maxlength="120" class="form-control required input-name-legal-representative" placeholder="<?php echo $legal_representative_name_value ?>"  value="<?php echo $name_legal_representative_nc ?>">
			</div>
		</div>
	</div>
	<?php
}

if($type_incorporate == 1 && $type == 1)
{
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<input name="check-cotitular" id="check-cotitular" type="checkbox" class="icheck" value="1" onclick="View_identity_cotitular(); View_upload_documents();">
				<label>Deseo incorporarme con un Cotitular</label>
			</div>
		</div>
	</div>

	<div id="identify-incorporate-cotitular"></div>

	<?php
}

if($type == 1)
{
	if($country != 2)
	{
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<input name="check-bank" id="check-bank" type="checkbox" class="icheck" value="1" onclick="View_bank();">
					<label>Deseo ingresar mi información bancaria <small>(Necesaria para el pago de bonificaciones)</small></label>
				</div>
			</div>
		</div>
		<div id="bank-incorporate"></div>
		<?php
	}
}

?>

<!-- No permitir espacios en input -->
<script>
	function Disabled_space(e, campo){
		key = e.keyCode ? e.keyCode : e.which;
		if (key == 32) {return false;}
	}		

	$('#number-document-one').on('input', function (e) {
	    if (!/^[a-z0-9]*$/i.test(this.value)) {
	        this.value = this.value.replace(/[^a-z0-9]+/ig,"");
	    }
	});

	$('#number-document-two').on('input', function (e) {
	    if (!/^[a-z0-9]*$/i.test(this.value)) {
	        this.value = this.value.replace(/[^a-z0-9]+/ig,"");
	    }
	});
</script>	
<!-- No permitir espacios en input -->