<?php 



require_once('../../functions.php'); /*Funciones*/



/*vars*/

$code = $_POST["code"];

$email = $_POST["email"];

/*vars*/



if($code == "")

{

	echo "";

}

else

{

	if($code == 1 || $code == 12 || $code == 123 || $code == 1234 || $code == 12345 || $code == 123456 || $code == 1234567 || $code == 12345678)

	{

		echo "El código $code no existe";

		?><script> document.getElementById("code-sponsor-validate").value = ""; </script><?php

	}

	else

	{

		$queryResult = $pdo->prepare("SELECT nombre FROM nikkenla_marketing.control_ci where codigo = :code and estatus = 1 and b1 = 1");

		$queryResult->execute(array(':code' => $code));

		$done = $queryResult->fetch();

		if($done)

		{

			echo $done['nombre'];

			?>

			<script> document.getElementById("code-sponsor-validate").value = "1"; </script>

			<script> document.getElementById("option-sponsor-1").disabled = true; </script>

			<script> document.getElementById("option-sponsor-2").disabled = true; </script>

			<?php



			if($email != "")

			{

				list($code_ce, $name_ce) = Search_ce($code, $email);



				if($code_ce != $code)

				{

					?>

					<script>

						swal({

							html:true,

				            title: "¡Atención!",

				            text: "Vemos que el correo electrónico <strong><?php echo $email ?></strong> se encuentra registrado en la base de clientes de la herramienta CLIENTE ÉLITE, y que al cliente registrado con este correo le brinda asesoría <u><strong><?php echo $name_ce ?></strong></u>, sin embargo, detectamos que este no es el Asesor de Bienestar bajo el cual te estás inscribiendo.<br/>¿Deseas continuar con la incorporación?",

				            type: "warning",

				            showCancelButton: true,

				            confirmButtonColor: "#14B96D",

				            confirmButtonText: "Continuar",

				            closeOnConfirm: false

				        },

				        function()

				        {

				            swal.close();

				        });

					</script>

					<?php

				}

			}

		}

		else

		{

			echo "El código $code no existe";

			?>

			<script> document.getElementById("code-sponsor-validate").value = ""; </script>

			<script> document.getElementById("option-sponsor-1").disabled = false; </script>

			<script> document.getElementById("option-sponsor-2").disabled = false; </script>

			<?php

		}

	}

	

}



?>