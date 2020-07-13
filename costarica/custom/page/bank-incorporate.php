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

<input type="text" name="number-account" id="number-account" <?php if($country == 8){?> maxlength="22" minlength="22" onblur="prueba(this.value);" <?php }else{ ?> maxlength="45" <?php }?> class="form-control input-number-account required" placeholder="<?php echo $name_number_account_value ?>">

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

<script>

// Valida campo test incorpo

function prueba(valor){

    const xp= /^[a-zñA-ZÑ]{2}[0-9]*$/;

    var comprueba = valor.match(xp);

   // document.writeln(comprueba);

    if(comprueba){

		document.getElementById('btn-continue').disabled = false;

        //View_alert('EL NUMERO DE CUENTA BANCARIA ES CORRECTO','warning');

        //alert("Esta bien");

    }else{

        View_alert('EL NUMERO DE CUENTA BANCARIA ES INCORRECTO','warning');

		document.getElementById('btn-continue').disabled = true;

        

        //alert("Esta mal");

    }

}

</script>



<!--script>

// Valida campo test incorpo

function prueba(valor){

                const xp= /^[a-zñA-ZÑ]{2}[0-9]+$/;

                var comprueba = valor.match(xp);

               // document.writeln(comprueba);

                if(comprueba){

                    alert("Esta bien");

                }else{

                    alert("Esta mal");

                }

            }

</script-->