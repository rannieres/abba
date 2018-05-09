<?php
$dns = "mysql:dbname=ficha;host=localhost";
$dbuser = "rannieres";
$dbpass = "305d47915";
try {
	$pdo = new PDO($dns, $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExeption $e){
	echo "Falha de conexão com o servidor".$e->getMessage();
}
?>