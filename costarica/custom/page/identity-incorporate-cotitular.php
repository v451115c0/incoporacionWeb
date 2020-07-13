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

			<input type="text" name="name-cotitular" onkeypress="return Only_letter(event);" oncopy="return false" onpaste="return false" class="form-control required input-name-cotitular" maxlength="100" placeholder="Apellidos y nombres completos del Cotitular">

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

			<input type="text" name="number-document-cotitular" id="number-document-cotitular" maxlength="40" class="form-control required input-number-document-cotitular" placeholder="NÃºmero de documento">

		</div>

	</div>

</div>



<script type="text/javascript">
	
function soloNumeros(e){
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}

</script>


<script>

	function validaRFC() {
            let pattern = /^[a-zA-Z]{3,4}(\d{6})((\D|\d){2,3})?$/;
            let rfc = document.getElementById("number-document-two").value;
            
            rfcLength = 13;
          
            if (pattern.test(rfc) && rfc.length == rfcLength) { // ?? Acá se comprueba
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

	$('#number-document-cotitular').on('input', function (e) {
	    if (!/^[a-z0-9]*$/i.test(this.value)) {
	        this.value = this.value.replace(/[^a-z0-9]+/ig,"");
	    }
	});

	$("#number-document-cotitular").on("change",function(){

		validate_document_one()

	});

	$("#number-document-cotitular").keypress(function(){

		validate_document_one()

	});

	$("#btn-continue").on("click",function(){
		validate_document_one()
	});	

	$('#type-document-cotitular').on("change",function (e) {
		/* Cedula de identidad */
		if ($('#type-document-cotitular').val()==10){
        	$('#number-document-cotitular').val('');
			$('#number-document-cotitular').attr('maxlength','9');
			$('#number-document-cotitular').attr('minlength','9');
        }
        if ($('#type-document-cotitular').val()==13){
        	$('#number-document-cotitular').val('');
            $('#number-document-cotitular').attr('maxlength','9');
        }
        if ($('#type-document-cotitular').val()==21){
        	$('#number-document-cotitular').val('');
			$('#number-document-cotitular').attr('maxlength','12');
			$('#number-document-cotitular').attr('minlength','11');
        }
        if ($('#type-document-cotitular').val()==39){
        	$('#number-document-cotitular').val('');
			$('#number-document-cotitular').attr('maxlength','10');
			$('#number-document-cotitular').attr('minlength','10');
		}
		if ($('#type-document-cotitular').val()==40){
        	$('#number-document-cotitular').val('');
			$('#number-document-cotitular').attr('maxlength','10');
			$('#number-document-cotitular').attr('minlength','10');
        }
	        
    });


    $('#number-document-cotitular').on("keypress",function(e){

		if ($('#type-document-cotitular').val()==10){
				var key = window.Event ? e.which : e.keyCode
				return (key >= 48 && key <= 57)    	
		}

    	if ($('#type-document-cotitular').val()==13){
        	
        	key = e.keyCode ? e.keyCode : e.which;
			if (key == 48 && $("#number-document-cotitular").val() == "") {return false;}

			var myLength = $("#number-document-cotitular").val().length;
			if($(this).val() == 1) //To check only when entering first character.
			{
			    if($("#number-document-cotitular").val() === '0')
			    {
			  	    	//alert('No se permite el 0 como primer carácter');
			       	$("#number-document-cotitular").val('');
			    }
			}

			var charCode = (e.which) ? e.which : e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			  return false;
			}

			Disabled_space(event,this);

        }
        if ($('#type-document-cotitular').val()==21){

			key = e.keyCode ? e.keyCode : e.which;
			if (key == 48 && $("#number-document-cotitular").val() == "") {return false;}

			var myLength = $("#number-document-cotitular").val().length;
			if($(this).val() == 1) //To check only when entering first character.
			{
			    if($("#number-document-cotitular").val() === '0')
			    {
			  	    	//alert('No se permite el 0 como primer carácter');
			       	$("#number-document-cotitular").val('');
			    }
			}

			var charCode = (e.which) ? e.which : e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			  return false;
			}

			Disabled_space(event,this);

        }
        if ($('#type-document-cotitular').val()==40){

			key = e.keyCode ? e.keyCode : e.which;
			if (key == 48 && $("#number-document-cotitular").val() == "") {return false;}

			var myLength = $("#number-document-cotitular").val().length;
			if($(this).val() == 1) //To check only when entering first character.
			{
			    if($("#number-document-cotitular").val() === '0')
			    {
			  	    	//alert('No se permite el 0 como primer carácter');
			       	$("#number-document-cotitular").val('');
			    }
			}

			var charCode = (e.which) ? e.which : e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			  return false;
			}

			Disabled_space(event,this);

        }
        if ($('#type-document-cotitular').val()==39){

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

