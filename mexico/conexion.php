<?php 

$dbHost = '104.238.83.157';
$dbName = 'nikkenla_incorporation';
$dbUser = 'nikkenla_mkrt';
$dbPass = 'NNikken2011$$';

try
{
	$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
	echo $e->getMessage();
	exit;
}

?>