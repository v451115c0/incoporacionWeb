<?php 



@session_name("incorporacion");

@session_start();



/*NIKKEN CHALLENGE*/

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

$data_functions = "";

/*vars*/



$number_document_value = "Número de documento";

$legal_representative_name_value = "Nombre del representante";

$residency_one_value = "Código postal";

$residency_two_value = "Estado";

$residency_three_value = "Municipio";

$residency_four_value = "Colonia";



if($type_incorporate == 0)

{

	if($country == 2)

	{

		$number_document_value = "Registro Federal de Contribuyentes (RFC)";

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

			<input type="text" id="number-document-one" name="number-document" onkeypress="javascript: return Disabled_space(event,this)" maxlength="40" <?php if($type_incorporate == 0){ ?> onblur="Validate_rfc(this.value);" <?php } ?> class="form-control required input-number-document" placeholder="<?php echo $number_document_value ?>">

		</div>

	</div>

</div>



<?php 



	if($country == 2 && $type_incorporate == 1) /*Solo méxico*/

	{

		?>

    <div class="row">

        <div class="col-md-12">

            <div class="form-group">

                <input type="text" id="number-document-two" name="rfc"  class="form-control input-rfc" maxlength="13" placeholder="RFC" value="XAXX010101000" onblur="Validate_rfc(this.value);">

            </div>

        </div>

    </div>

		<!--onkeypress="javascript: return Disabled_space(event,this)"->

		<pre id="RFCResult"></pre>



		<?php

	}

	else

	{

		?><input type="hidden" id="number-document-two" name="rfc" class="input-rfc"><?php

	}



?>



<!-- Validador de RFC -->


<div id="RFCResult" style="padding-bottom: 10px; color: red; font-weight: 600; line-height: 100%;">WARNING <span style="color: #333; font-size: 14px;">Ingresa tu RFC en esta sección, si no cuentas con un RFC continúa llenando los campos</span></div>



<input type="hidden"  id="validator-rfc" class="required">

<!-- Validador de RFC -->



<?php 



if($type_incorporate == 0) /*Solo para empresas*/

{

	?>

	<div class="row">

		<div class="col-md-12">

			<div class="form-group">

				<input type="text" name="name-legal-representative" maxlength="120" class="form-control required input-name-legal-representative" placeholder="<?php echo $legal_representative_name_value ?>">

			</div>

		</div>

	</div>

	<?php

}



?>



<h4 class="main_question">Información de Envío</h4>



<div class="row">

	<div class="col-md-6">

		<div class="form-group">

			<input type="text" name="address" class="form-control required input-address" placeholder="Calle" maxlength="60">

		</div>

	</div>

	<div class="col-md-6">

		<div class="form-group">

			<input type="text" name="address-number" class="form-control required input-address-number" placeholder="Número" maxlength="10">

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

					<input type="text" name="residency-one" class="form-control required input-residency-one" id="residency-one" maxlength="5" onkeyup="Search_state(this.value);" onkeypress="return JustNumbers(event);" placeholder="<?php echo $residency_one_value ?>">

				</div>

			</div>



			<script>Search_state();</script>

			<?php

		} 

		if($residency_two_value != "") /*Estado*/

		{

			?>

			<div class="col-md-6">

				<div class="form-group">

					<div class="styled-select">

						<select class="required input-residency-two" name="residency-two" id="residency-two" onchange="Search_municipality(this.value);"></select>

					</div>

				</div>

			</div>



			<script>Search_municipality(<?php echo $data_functions ?>);</script>

			<?php

		} 

		if($residency_three_value != "") /*Municipio*/

		{

			?>

			<div class="col-md-6">

				<div class="form-group">

					<div class="styled-select">

						<select class="required input-residency-three" name="residency-three" id="residency-three" onchange="Search_colony(this.value);"></select>

					</div>

				</div>

			</div>



			<script>Search_colony(<?php echo $data_functions ?>);</script>

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

			<?php

		} 

	?>

</div>



<div class="row">

	<div class="col-md-6">

		<div class="form-group">

			<input name="check-invoice" id="check-invoice" type="checkbox" class="icheck" value="1" onclick="View_identity_invoice();">

			<label>Deseo Factura</label>

		</div>

	</div>

	<div class="clearfix"></div>

	<div class="col-md-12">

		<div class="" id="view-cfdi" style="display: none; width: 100%;">

			<div class="pull-left col-sm-6"><label>Uso de CFDI</label></div>

			<div class="col-sm-6 styled-select">

				<select class="input-cfdi">

					<option value="G01">Adquisición de Mercancías</option>

					<option value="G03">Gastos en General</option>

					<option value="P01">Por Definir</option>

				</select>

			</div>

		</div>

	</div>

</div>



<div class="row" style="display: none; width: 100%;" id="view-invoice-revert">

	<div class="col-md-12">

		<div class="form-group">

			<div class="pull-left">

				<label>Dirección de Facturación</label>

			</div>

			<div class="pull-right">

				<input name="check-invoice-revert" id="check-invoice-revert" type="checkbox" class="icheck" value="1" onclick="View_identity_invoice_revert();">

				<label>Deseo usar mi dirección de envío</label>

			</div>

		</div>

	</div>

</div>



<div id="identify-incorporate-invoice"></div>



<?php 



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



        //document.getElementById("RFCResult").innerText = "\nFormato: " + valido;

        return validate;

    }



	function Disabled_space(e, campo){

		key = e.keyCode ? e.keyCode : e.which;

		if (key == 32) {return false;}

	}		


/*
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
*/
</script>	

<!-- No permitir espacios en input -->