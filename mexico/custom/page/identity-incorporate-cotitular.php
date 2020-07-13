<?php 

/*vars*/
$country = $_POST["country"];
$type = $_POST["type"];
$type_incorporate = $_POST["type_incorporate"];
/*vars*/

?>

<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<input type="text" name="name-cotitular" onkeypress="return Only_letter(event);" oncopy="return false" onpaste="return false" class="form-control required input-name-cotitular" maxlength="120" placeholder="Apellidos y nombres completos del Cotitular">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<div class="styled-select">
				<select class="required input-type-document-cotitular" name="type-document-cotitular" id="type-document-cotitular"></select>
			</div>
		</div>
	</div>

	<!-- Cargar tipos de documento -->
	<script>Type_document_cotitular('<?php echo $country ?>', '<?php echo $type ?>', '<?php echo $type_incorporate ?>');</script>
	<!-- Cargar tipos de documento -->
	
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" name="number-document-cotitular" maxlength="40" class="form-control required input-number-document-cotitular" placeholder="Número de documento">
		</div>
	</div>
</div>