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
$cotitular = $_POST["cotitular"];
$id = date("ymd") . date("His") . rand(1, 99);
$counter_images = 0;
$concat = "";
/*vars*/

?>
<ul>
	<?php 

	if($type_incorporate == 2)
	{
		$concat = $concat . "<li>Anexar copia deL RUC</li>";
		$counter_images++;
	}
	else
	{
		if($type == 1)
		{
			$concat = $concat . "<li>Anexar copia de Identificación (Por ambos lados)</li>";

			if($cotitular == 1)
			{
				$concat = $concat . "<li>Anexar copia de Identificación co-titular (Por ambos lados)</li>";
				$counter_images++;
			}

			$counter_images++;
		}

		if($type_incorporate == 0)
		{
			if($country == 1)
			{
				$concat = $concat . "<li>Anexar copia de Régimen (RUT)</li>";
				$concat = $concat . "<li>Anexar Copia Camara de Comercio (minimo de 3 meses) </li>";
				$concat = $concat . "<li>Anexar Copia Carta por poder del Representante Legal</li>";
				$concat = $concat . "<li>Anexar Copia de la de Cédula del Representante Legal</li>";

				$counter_images++;
				$counter_images++;
				$counter_images++;
				$counter_images++;
			}
			if($country == 2)
			{
				$concat = $concat . "<li>Anexar copia de RFC</li>";
				$concat = $concat . "<li>Anexar Identificación del Representante Legal</li>";

				$counter_images++;
				$counter_images++;
			}
			if($country == 3)
			{
				$concat = $concat . "<li>Anexar copia de Régimen (RUC)</li>";
				$concat = $concat . "<li>Anexar Copia Acta de constitución</li>";
				$concat = $concat . "<li>Anexar Copia de la fichar SUNARP (registros públicos)</li>";
				$concat = $concat . "<li>Anexar Copia del DNI del representante legal</li>";

				$counter_images++;
				$counter_images++;
				$counter_images++;
				$counter_images++;
			}
			if($country == 4)
			{
				$concat = $concat . "<li>Anexar copia de Régimen (RUC)</li>";
				$concat = $concat . "<li>Anexar Copia Acta constitutiva</li>";
				$concat = $concat . "<li>Anexar Copia Carta por poder del Representante Legal</li>";
				$concat = $concat . "<li>Anexar Copia de identificación vigente del Representante Legal</li>";

				$counter_images++;
				$counter_images++;
				$counter_images++;
				$counter_images++;
			}
			if($country == 5)
			{
				$concat = $concat . "<li>Anexar Copia de pacto social</li>";
				$concat = $concat . "<li>Anexar Copia de aviso de operación</li>";
				$concat = $concat . "<li>Anexar Copia de identificación vigente del Representante Legal</li>";

				$counter_images++;
				$counter_images++;
				$counter_images++;
			}
			if($country == 6)
			{
				$concat = $concat . "<li>Anexar copia de Régimen (NIT)</li>";
				$concat = $concat . "<li>Anexar Copia Acta constitutiva</li>";
				$concat = $concat . "<li>Anexar Copia Carta por poder del Representante Legal</li>";
				$concat = $concat . "<li>Anexar Copia de identificación vigente del Representante Legal</li>";
				$concat = $concat . "<li>Anexar Copia Patente de comercio o sociedad</li>";

				$counter_images++;
				$counter_images++;
				$counter_images++;
				$counter_images++;
				$counter_images++;
			}
			if($country == 7)
			{
				$concat = $concat . "<li>Anexar copia de Régimen (NIT)</li>";
				$concat = $concat . "<li>Anexar Copia Carta constitutiva de la empresa</li>";
				$concat = $concat . "<li>Anexar Copia Carta por poder del Representante Legal</li>";
				$concat = $concat . "<li>Anexar Copia de identificación vigente del Representante Legal</li>";

				$counter_images++;
				$counter_images++;
				$counter_images++;
				$counter_images++;
			}
			if($country == 8)
			{
				$concat = $concat . "<li>Anexar copia de Régimen (RUT)</li>";
				$concat = $concat . "<li>Anexar Copia Acta constitutiva</li>";
				$concat = $concat . "<li>Anexar Copia Carta por poder del Representante Legal</li>";
				$concat = $concat . "<li>Anexar Copia de identificación vigente del Representante Legal</li>";

				$counter_images++;
				$counter_images++;
				$counter_images++;
				$counter_images++;
			}
		}
	}

	if($counter_images == 0)
	{
		?>
		<p><u><strong>Este paso no es obligatorio</strong></u> para tu tipo de incorporación.</p>
		<script>document.getElementById("validator").value = "1";</script>
		<?php
	}
	else
	{
		?><p class="format-p-ul">A continuación ingresa los siguientes documentos, recuerda que <u><strong>cada uno debe venir por separado</strong></u>:</p><?php
		echo $concat;
	}

	?>
</ul>

<input type="hidden" id="quantity-images" value="<?php echo $counter_images ?>">
<input type="file" name="files">
<input type="hidden" class="required" id="validator">
<input type="hidden" id="dir_file_image" class="input-id" value="<?php echo $id ?>">

<!-- Funcion para cargar imagen -->
<script>
	$(document).ready(function() {
	
	// enable fileuploader plugin
		$('input[name="files"]').fileuploader({
	        changeInput: '<div class="fileuploader-input">' +
						      '<div class="fileuploader-input-inner">' +
							      '<img src="custom/img/general/fileuploader-dragdrop-icon.png">' +
								  '<h3 class="fileuploader-input-caption"><span>Arrastra los archivos aquí</span></h3>' +
								  '<p>o puedes</p>' +
								  '<div class="fileuploader-input-button"><span>Buscar archivos</span></div>' +
							  '</div>' +
						  '</div>',
	        theme: 'dragdrop',
			upload: {
	            url: 'plugins/upload/examples/drag-drop/php/ajax_upload_file.php',
	            data: null,
	            type: 'POST',
	            enctype: 'multipart/form-data',
	            start: true,
	            synchron: true,
	            beforeSend: function(item) {
	                var input = $('#dir_file_image');
	                item.upload.data.dir_file = input.val();
	            },
	            onSuccess: function(result, item) {
	                var data = JSON.parse(result);
	                
	                if(data.isSuccess && data.files[0]) {
	                    item.name = data.files[0].name;
	                    item.file = data.files[0].file;

	                    Validate_quantity_images(document.getElementById("quantity-images").value, document.getElementById("dir_file_image").value);
	                }
	                
	                item.html.find('.column-actions').append('<a class="fileuploader-action fileuploader-action-remove fileuploader-action-success" title="Remove"><i></i></a>');
	                setTimeout(function() {
	                    item.html.find('.progress-bar2').fadeOut(400);
	                }, 400);
	            },
	            onError: function(item) {
					var progressBar = item.html.find('.progress-bar2');
					
					if(progressBar.length > 0) {
						progressBar.find('span').html(0 + "%");
	                    progressBar.find('.fileuploader-progressbar .bar').width(0 + "%");
						item.html.find('.progress-bar2').fadeOut(400);
					}
	                
	                item.upload.status != 'cancelled' && item.html.find('.fileuploader-action-retry').length == 0 ? item.html.find('.column-actions').prepend(
	                    '<a class="fileuploader-action fileuploader-action-retry" title="Retry"><i></i></a>'
	                ) : null;
	            },
	            onProgress: function(data, item) {
	                var progressBar = item.html.find('.progress-bar2');
					
	                if(progressBar.length > 0) {
	                    progressBar.show();
	                    progressBar.find('span').html(data.percentage + "%");
	                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
	                }
	            },
	            onComplete: null,
	        },
			onRemove: function(item) {
				$.post('plugins/upload/examples/drag-drop/php/ajax_remove_file.php', {
					file: item.name
				});
			},
			captions: {
	            feedback: 'Drag and drop files here',
	            feedback2: 'Drag and drop files here',
	            drop: 'Drag and drop files here'
	        },
		});
	});
</script>
<!-- Funcion para cargar imagen -->

<!-- Validar cantidad de imagenes cargadas -->
<script>
	function Validate_quantity_images(quantity, id)
	{	
		var dataString = 'id=' + id;

		$.ajax({
            type: 'POST',
            url: 'custom/querys/quantity-files.php',
            data: dataString,
            success: function (data)
            {
                if(data >= quantity)
                {
                	document.getElementById("validator").value = "1";
                }
                else
                {
                	document.getElementById("validator").value = "";
                }
            }
        });

        return false;
	}
</script>
<!-- Validar cantidad de imagenes cargadas -->
