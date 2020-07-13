<?php 

require_once('../../functions.php'); /*Funciones*/

/*vars*/
$email = $_POST["email"];
/*vars*/

$queryResult = $pdo->prepare("SELECT payment FROM contracts where email = :email");
$queryResult->execute(array(':email' => $email));
$done = $queryResult->fetch();
if($done)
{
	if($done['payment'] == 0)
	{
		echo "el correo ingresado esta pendiente por generar el pago del Kit de inicio, por favor, utiliza la opción <strong>RETOMAR INCORPORACIÓN</strong>";
		exit;
	}
	else
	{
		echo "el <strong>correo ingresado ya se encuentra utilizado</strong>, por favor utilizar uno nuevo";
		exit;
	}
}
else
{
	$queryResult = $pdo->prepare("SELECT correo FROM nikkenla_marketing.control_ci where correo = :email and estatus = 1");
	$queryResult->execute(array(':email' => $email));
	$done = $queryResult->fetch();
	if($done)
	{
		echo "el <strong>correo ingresado ya se encuentra utilizado</strong>, por favor utilizar uno nuevo";
		exit;
	}
}

?>