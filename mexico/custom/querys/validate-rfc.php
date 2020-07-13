<?php 

/*vars*/
$rfc = $_POST["rfc"];
/*vars*/

$url = "https://solucionfactible.com/timbrado/api/RFC/consulta/$rfc";
$username = "sfnikkenmex@iesisa.mx";
$password = "NLA040617M26";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$info = curl_getinfo($ch);
$response = curl_exec($ch);
$err = curl_error($ch);

curl_close($ch);

if ($err)
{
    echo "0";
}
else
{
	$uname = json_decode($response);
	echo $uname->status;
}

?>