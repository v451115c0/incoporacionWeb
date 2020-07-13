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
	if($country == 1)
	{
		$number_document_value = "Número de Identificación Tributaria";
	}
	if($country == 2)
	{
		$number_document_value = "Registro Federal de Contribuyentes (RFC)";
	}
	if($country == 3 || $country == 4 || $country == 5)
	{
		$number_document_value = "Número de Identificación (RUC)";
	}
	if($country == 6 || $country == 7 )
	{
		$number_document_value = "Número de Identificación (NIT)";
	}
	if($country == 8)
	{
		$number_document_value = "Número de Identificación";
	}
}

if($country == 2)
{
	$address_value = "Dirección de residencia (Ingresa solo Calle y Número)";
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
					<select class="required input-type-document" name="type-document" id="type-document"></select>
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
			<input type="text" id="number-document-one"  name="number-document"  <?php if($country == 5){ ?>  maxlength="15" <?php } ?> maxlength="13" class="form-control required input-number-document" placeholder="<?php echo $number_document_value ?>" value="<?php echo $number_document_nc ?>">
			<pre id="RFCResultMoral"></pre>
			<input id="number_document_input_value" style="display: none;" value="<?php echo $number_document_value ?>">
		</div>
	</div>
</div>

<script type="text/javascript">
	
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}

</script>

<?php 

	if($country == 2 && $type_incorporate == 1) /*Solo méxico*/
	{
		//aqui ?>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<input type="text" id="number-document-two" name="rfc"  class="form-control input-rfc" maxlength="13" placeholder="Registro Federal de Contribuyentes (RFC)" onkeyup="validaRFC()"  value="<?php echo $rfc_nc ?>">
				</div>
			</div>
		</div>
		<pre id="RFCResult"></pre>

		<?php
		//onkeypress="javascript: return Disabled_space(event,this)"
	}

?>

<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<input type="text" name="address" class="form-control required input-address" placeholder="<?php echo $address_value ?>" value="<?php echo $address_nc ?>">
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
				<input type="text" name="name-legal-representative" maxlength="120" class="form-control required input-name-legal-representative" placeholder="<?php echo $legal_representative_name_value ?>" value="<?php echo $name_legal_representative_nc ?>">
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

	function validaRFC() {
            let pattern = /^[a-zA-Z]{3,4}(\d{6})((\D|\d){2,3})?$/;
            let rfc = document.getElementById("number-document-two").value;
            
            rfcLength = 13;
          
            if (pattern.test(rfc) && rfc.length == rfcLength) { // ⬅️ Acá se comprueba
                valido = "Válido";
                //resultado.classList.add("ok");
                validate = true;
            } else {
                valido = "No válido";
    
                validate = false;
                //resultado.classList.remove("ok");
            }
    
            document.getElementById("RFCResult").innerText = "\nFormato: " + valido;
            return validate;
    }

	function Disabled_space(e, campo){
		key = e.keyCode ? e.keyCode : e.which;
		if (key == 32) {return false;}
	}		

	$('#number-document-one').on('input', function (e) {
	    if (!/^[a-z0-9]*$/i.test(this.value)) {
	        this.value = this.value.replace(/[^a-z0-9]+/ig,"");
	    }
	});

	$("#number-document-one").on("change",function(){

		validate_document_one()

	});

	$("#number-document-one").keypress(function(){

		validate_document_one()

	});

	$("#btn-continue").on("click",function(){
		validate_document_one()
	});

	
	

	$('#type-document').on("change",function (e) {

        if ($('#type-document').val()==13){
        	$('#number-document-one').val('');
            $('#number-document-one').attr('maxlength','9');
        }
        if ($('#type-document').val()==21){
        	$('#number-document-one').val('');
            $('#number-document-one').attr('maxlength','12');
        }
        if ($('#type-document').val()==39){
        	$('#number-document-one').val('');
            $('#number-document-one').attr('maxlength','13');
        }
	        
    });


    $('#number-document-one').on("keypress",function(e){

    	if ($('#type-document').val()==13){
        	
        	key = e.keyCode ? e.keyCode : e.which;
			if (key == 48 && $("#number-document-one").val() == "") {return false;}

			var myLength = $("#number-document-one").val().length;
			if($(this).val() == 1) //To check only when entering first character.
			{
			    if($("#number-document-one").val() === '0')
			    {
			  	    	//alert('No se permite el 0 como primer carácter');
			       	$("#number-document-one").val('');
			    }
			}

			var charCode = (e.which) ? e.which : e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			  return false;
			}

			Disabled_space(event,this);

        }
        if ($('#type-document').val()==21){

			key = e.keyCode ? e.keyCode : e.which;
			if (key == 48 && $("#number-document-one").val() == "") {return false;}

			var myLength = $("#number-document-one").val().length;
			if($(this).val() == 1) //To check only when entering first character.
			{
			    if($("#number-document-one").val() === '0')
			    {
			  	    	//alert('No se permite el 0 como primer carácter');
			       	$("#number-document-one").val('');
			    }
			}

			var charCode = (e.which) ? e.which : e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			  return false;
			}

			Disabled_space(event,this);

        }
        if ($('#type-document').val()==40){

			key = e.keyCode ? e.keyCode : e.which;
			if (key == 48 && $("#number-document-one").val() == "") {return false;}

			var myLength = $("#number-document-one").val().length;
			if($(this).val() == 1) //To check only when entering first character.
			{
			    if($("#number-document-one").val() === '0')
			    {
			  	    	//alert('No se permite el 0 como primer carácter');
			       	$("#number-document-one").val('');
			    }
			}

			var charCode = (e.which) ? e.which : e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			  return false;
			}

			Disabled_space(event,this);

        }
        if ($('#type-document').val()==39){

			Disabled_space(event,this);

        }
		  
    });

	$('#number-document-two').on('input', function (e) {
	    if (!/^[a-z0-9]*$/i.test(this.value)) {
	        this.value = this.value.replace(/[^a-z0-9]+/ig,"");
	    }
	});
</script>	
<!-- No permitir espacios en input -->