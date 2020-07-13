<?php 

@session_name("incorporacion");
@session_start();

if(isset($_SESSION["type_incorporate_nc"])){
		$type_incorporate_nc = $_SESSION["type_incorporate_nc"];
}

$country = $_POST["country"];


if($country == 1)
{
	$kit = "5006 Kit Clásico $61,000.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$661,800.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$1,317,800.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $1,661,000.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $2,317,000.00";
}
if($country == 2)
{
	$kit = "5006 Kit Clásico $400.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$4,105.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$7,775.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $11,237.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $14,907.00";
}
if($country == 3)
{
	$kit = "5006 Kit Clásico S/ 68.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	S/ 719.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	S/ 1,444.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  S/ 2,095.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 S/ 2,820.00";
}
if($country == 4)
{
	$kit = "5006 Kit Clásico $28.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$256.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$483.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $614.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $842.00";
}
if($country == 5)
{
	$kit = "5006 Kit Clásico $32.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$205.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$378.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $480.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $654.00";
}
if($country == 6)
{
	$kit = "5006 Kit Clásico Q 196.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	Q 1,338.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	Q 2,827.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  Q 3,706.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 Q 5,195.00";
}
if($country == 7)
{
	$kit = "5006 Kit Clásico $28.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	$181.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	$379.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  $497.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 $695.00";
}
if($country == 8)
{
	$kit = "5006 Kit Clásico ₡ 17100.00";
	$kit2 = "5023 KIT INFLUENCER  PI WATER	₡ 118,380.00";
	$kit3 = "5024 KIT INFLUENCER  WATERFALL	₡ 216,780.00";
	$kit4 = "5025 KIT INFLUENCER  PAQUETE PI WATER+ OPTIMIZER  ₡ 293,980.00";
	$kit5 = "5026 KIT INFLUENCER  PAQUETE WATERFALL + OPTIMIZER	 ₡ 392,380.00";
}




if ($country > 0) {
	?>
<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<div class="styled-select">
					<select class="required" name="type-kit" id="type-kit" onchange="getDataShirt()">
						<option value="">Selecciona un Kit de inicio</option>
						<option value="5006"><?php echo $kit ?></option>
						<option value="5023"><?php echo $kit2 ?></option>
						<option value="5024"><?php echo $kit3 ?></option>
						<option value="5025"><?php echo $kit4 ?></option>
						<option value="5026"><?php echo $kit5 ?></option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<input type="hidden" name="type-msi" id="type-msi">
		</div>
</div>

	<?php
	# code...
}


?>



