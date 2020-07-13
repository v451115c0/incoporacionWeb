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

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<div class="styled-select">
				<select class="required input-bank" name="bank" id="bank"></select>
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
			<input type="text" name="number-account" maxlength="45" class="form-control input-number-account" placeholder="<?php echo $name_number_account_value ?>">
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
				<input type="text" name="number-clabe-account" maxlength="45" class="form-control input-number-clabe-account <?php if($country == 8){ echo "required"; } ?>" placeholder="<?php echo $name_clabe_account_value ?>">
			</div>
		</div>
		<?php	
	}

	?>
	
</div>
