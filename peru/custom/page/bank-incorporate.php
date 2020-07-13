<?php 

/*vars*/
$country = $_POST["country"];

$name_clabe_account_value = "CCI";
$name_number_account_value = "Número de cuenta";

if($country == 8)
{
	$name_number_account_value = "Número de cuenta bancaria cliente";
	$name_clabe_account_value = "Cédula de propietario de cuenta";	
}

?>
<small>Por favor no ingresar simbolos especiales.</small>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<div class="styled-select">
				<select class="required input-bank" onchange="Validate_bank(this.value)" name="bank" id="bank"></select>
			</div>
		</div>
	</div>

	<!-- Cargar catálogo de bancos -->
	<script>Catalog_banks('<?php echo $country ?>');</script>
	<!-- Cargar catálogo de bancos -->

	<div class="col-md-6">
		<div class="form-group">
			<div class="styled-select">
				<select class="required input-bank-type" name="bank-type" id="bank-type"></select>
			</div>
		</div>
	</div>

	<!-- Cargar catálogo de bancos -->
	<script>Catalog_banks_type('<?php echo $country ?>');</script>
	<!-- Cargar catálogo de bancos -->
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" name="number-account" id="number-account" onblur="Validate_account(this.value)" maxlength="14" class="form-control input-number-account" placeholder="<?php echo $name_number_account_value ?>">
		</div>
	</div>
	<?php 

	if($country == 1 || $country == 4 || $country == 5 || $country == 6 || $country == 7)
	{}
	else
	{
		?>
		<div class="col-md-6">
			<div class="form-group">
				<input type="text" name="number-clabe-account" id="number-clabe-account" onblur="Validate_CCI(this.value)" onkeypress="javascript: return Disabled_space(event,this)" maxlength="20" class="form-control input-number-clabe-account <?php if($country == 8){ echo "required"; } ?>" placeholder="<?php echo $name_clabe_account_value ?>">
			</div>
		</div>
		<?php	
	}

	?>
	
</div>

<!-- No permitir espacios en input -->
<script>
	function Disabled_space(e, campo){
		key = e.keyCode ? e.keyCode : e.which;
		if (key == 32) {return false;}
	}		

	$('#number-clabe-account').on('input', function (e) {
	    if (!/^[a-z0-9]*$/i.test(this.value)) {
	        this.value = this.value.replace(/[^a-z0-9]+/ig,"");
	    }
	});

	$('#number-account').on('input', function (e) {
	    if (!/^[a-z0-9]*$/i.test(this.value)) {
	        this.value = this.value.replace(/[^a-z0-9]+/ig,"");
	    }
	});
</script>	
<!-- No permitir espacios en input -->