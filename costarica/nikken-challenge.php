<?php 

session_name("incorporacion");
session_start();

require_once('functions.php'); /*Funciones*/

if(isset($_GET["email"]))
{
	$email = base64_decode($_GET["email"]);

	$queryResult = $pdo->prepare("SELECT country, type, type_incorporate, sponsor, email, cellular, birthday, address, residency_one, residency_two, residency_three, residency_four, type_document, number_document, rfc, name, name_legal_representative, gender FROM nikkenla_provider.challenge_contracts WHERE email = :email");
	$queryResult->execute(array(':email' => $email));
	$row = $queryResult->fetch(PDO::FETCH_ASSOC);
	if($row > 0)
	{
		$_SESSION["country_nc"] = $row["country"];
		$_SESSION["type_nc"] = $row["type"];
		$_SESSION["type_incorporate_nc"] = $row["type_incorporate"];
		$_SESSION["sponsor_nc"] = $row["sponsor"];
		$_SESSION["email_nc"] = $row["email"];
		$_SESSION["cellular_nc"] = $row["cellular"];
		$_SESSION["address_nc"] = $row["address"];
		$_SESSION["residency_one_nc"] = $row["residency_one"];
		$_SESSION["residency_two_nc"] = $row["residency_two"];
		$_SESSION["residency_three_nc"] = $row["residency_three"];
		$_SESSION["residency_four_nc"] = $row["residency_four"];
		$_SESSION["type_document_nc"] = $row["type_document"];
		$_SESSION["number_document_nc"] = $row["number_document"];
		$_SESSION["rfc_nc"] = $row["rfc"];
		$_SESSION["name_nc"] = $row["name"];
		$_SESSION["name_legal_representative_nc"] = $row["name_legal_representative"];
		$_SESSION["gender_nc"] = $row["gender"];

		if($row["country"] == 3){
			$queryResult = $pdo->prepare("SELECT name FROM citys where code = :code and country = :country");
			$queryResult->execute(array(':code' => $row["residency_two"], ':country' => $row["country"]));
			$done = $queryResult->fetch();
			if($done)
			{
				$_SESSION["residency_two_nc"] = $done['name'];
			}
		}

		/*echo $_SESSION["country_nc"] . "<br/>";
		echo $_SESSION["type_nc"] . "<br/>";
		echo $_SESSION["type_incorporate_nc"] . "<br/>";
		echo $_SESSION["sponsor_nc"] . "<br/>";
		echo $_SESSION["email_nc"]  . "<br/>";
		echo $_SESSION["cellular_nc"] . "<br/>";
		echo $_SESSION["birthday_nc"] . "<br/>";
		echo $_SESSION["address_nc"] . "<br/>";
		echo $_SESSION["residency_one_nc"] . "<br/>";
		echo $_SESSION["residency_two_nc"] . "<br/>";
		echo $_SESSION["residency_three_nc"] . "<br/>";
		echo $_SESSION["residency_four_nc"] . "<br/>";
		echo $_SESSION["type_document_nc"] . "<br/>";
		echo $_SESSION["number_document_nc"] . "<br/>";
		echo $_SESSION["rfc_nc"] . "<br/>";
		echo $_SESSION["name_nc"] . "<br/>";*/
	}
}

/*Redireccionar*/
header('location: index.html');
exit;

?>