<?php 

@session_name("incorporacion");
@session_start();

/*NIKKEN CHALLENGE*/
	$first_name_nc = "";
	$last_name_nc = "";
	$birthday_nc = "";
	$type_incorporate_nc = "";

	if(isset($_SESSION["name_nc"])){
		$name_nc = $_SESSION["name_nc"];
		$name_nc_detail = explode(",", $name_nc);
		$last_name_nc = $name_nc_detail[0];
		if(isset($name_nc_detail[1])){
			$first_name_nc = $name_nc_detail[1];
		}
	}

	if(isset($_SESSION["birthday_nc"])){
		$birthday_nc = substr($_SESSION["birthday_nc"], 8, 2) . "/" . substr($_SESSION["birthday_nc"], 5, 2) . "/" . substr($_SESSION["birthday_nc"], 0, 4);
	}

	if(isset($_SESSION["type_incorporate_nc"])){
		$type_incorporate_nc = $_SESSION["type_incorporate_nc"];
	}
/*NIKKEN CHALLENGE*/

/*vars*/
$type = $_POST["type"];
if($type_incorporate_nc != ""){ $type = $type_incorporate_nc; }
/*vars*/

$first_name_value = "Nombres";
$last_name_value = "Apellidos";
$birthday_value = "Fecha de nacimiento dd/mm/aaaa";

if($type == 0)
{
	$first_name_value = "Nombre de la empresa";
	$birthday_value = "Fecha nacimiento representante";
}

?>

<div class="row">
	<?php 

	$columns = 6;

	if($type != 0)
	{
		$columns = 3;

		?>
		<div class="col-md-3">
			<div class="form-group">
				<input type="text" name="last-name" id="last-name" onkeypress="return Only_letter(event);" oncopy="return false" onpaste="return false" maxlength="60" class="form-control input-last-name required" placeholder="<?php echo $last_name_value ?>"  value="<?php echo $last_name_nc ?>">
			</div>
		</div>
		<?php
	}
	else
	{
		?>
		<input type="hidden" name="last-name" id="last-name" class="input-last-name">
		<?php
	}

	?>
	<div class="col-md-<?php echo $columns ?>">
		<div class="form-group">
			<input type="text" name="name" id="name" oncopy="return false" onpaste="return false" maxlength="60" class="form-control input-name required" placeholder="<?php echo $first_name_value ?>" value="<?php if($type_incorporate_nc == 0){ echo $last_name_nc; }else{ echo $first_name_nc; } ?>">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control input-birthday required" name="birthday" id="birthday" maxlength="10" placeholder="<?php echo $birthday_value ?>" value="<?php echo $birthday_nc ?>">
			<input type="hidden" class="form-control required" id="validator-birthday" value="<?php if($birthday_nc != ""){ echo "1"; } ?>">
		</div>
	</div>
</div>

<!-- Habilitar calendario -->
	<script>
		$(document).ready(function(){
        var date_input=$('input[name="birthday"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        }).on('changeDate', function(ev){
        	var birthday = document.getElementById('birthday').value;

        	if(birthday == "")
        	{
        		document.getElementById('validator-birthday').value = "";
        	}
        	else
        	{
		        if(Validate_birthday(birthday) < 18)
		        {
		        	document.getElementById('validator-birthday').value = "";
		        	View_alert("Lo sentimos, <strong>debes ser mayor de edad</strong> para inscribirte a NIKKEN", "warning");
                    return false;
		        }
		        else
		        {
		        	document.getElementById('validator-birthday').value = "1";
		        }
        	}
    	});
    })
	</script>
<!-- Habilitar calendario -->