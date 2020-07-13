<?php 

/*vars*/
$last_name = $_POST["last_name"];
$name = $_POST["name"];
$document_one = $_POST["document_one"];
$document_two = $_POST["document_two"];
/*vars*/

if($last_name != "")
{
	$name = $last_name . ", " . $name;
}

if($document_two != "")
{
	$document_one = $document_two;
}

$residency_one_value = "Código postal";
$residency_two_value = "Estado";
$residency_three_value = "Municipio";
$residency_four_value = "Colonia";
$data_functions = "";

?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="<?php echo $name ?>" disabled>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="<?php echo $document_one ?>" disabled>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" name="address" class="form-control required input-address-invoice" placeholder="Calle" maxlength="60">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" name="address-number" class="form-control required input-address-number-invoice" placeholder="Número" maxlength="10">
		</div>
	</div>
</div>
<div class="row">
	<?php 
		if($residency_one_value != "") /*Codigo postal*/
		{
			?>
			<div class="col-md-6" >
				<div class="form-group">
					<input type="text" name="residency-invoice-one" class="form-control required input-residency-invoice-one" id="residency-invoice-one" maxlength="5" onkeyup="Search_invoice_state(this.value);" onkeypress="return JustNumbers(event);" placeholder="<?php echo $residency_one_value ?>">
				</div>
			</div>

			<script>Search_invoice_state();</script>
			<?php
		} 
		if($residency_two_value != "") /*Estado*/
		{
			?>
			<div class="col-md-6">
				<div class="form-group">
					<div class="styled-select">
						<select class="required input-residency-invoice-two" name="residency-invoice-two" id="residency-invoice-two" onchange="Search_invoice_municipality(this.value);"></select>
					</div>
				</div>
			</div>

			<script>Search_invoice_municipality(<?php echo $data_functions ?>);</script>
			<?php
		} 
		if($residency_three_value != "") /*Municipio*/
		{
			?>
			<div class="col-md-6">
				<div class="form-group">
					<div class="styled-select">
						<select class="required input-residency-invoice-three" name="residency-invoice-three" id="residency-invoice-three" onchange="Search_invoice_colony(this.value);"></select>
					</div>
				</div>
			</div>

			<script>Search_invoice_colony(<?php echo $data_functions ?>);</script>
			<?php
		} 
		if($residency_four_value != "")
		{
			?>
			<div class="col-md-6">
				<div class="form-group">
					<div class="styled-select">
						<select class="required input-residency-invoice-four" name="residency-invoice-four" id="residency-invoice-four"></select>
					</div>
				</div>
			</div>
			<?php
		} 
	?>
</div>