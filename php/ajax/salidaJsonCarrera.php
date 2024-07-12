<?php

include("./datosConexionBase.php");

$hoy = date("Y-m-d H:i:s");
$respuesta_estado=$hoy . "\n";

$idCarrera=$_GET['idCarrera'];

try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	
	$respuesta_estado = $respuesta_estado .  "\n<br />conexion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}

$sql = "select * from carreras where idCarrera=:bindidCarrera";

try {
	$stmt = $dbh->prepare($sql);	
	$respuesta_estado = $respuesta_estado .  "\n<br />preparacion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}

$stmt->setFetchMode(PDO::FETCH_ASSOC);

try {
	$stmt->bindParam(':bindidCarrera', $idCarrera);
	$respuesta_estado = $respuesta_estado .  "\n<br /> bind exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}

try {
	$stmt->execute();	
	$respuesta_estado = $respuesta_estado .  "\n<br /> ejecucion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}

$fila = $stmt->fetch();

$objCarrera = new stdClass();
	$objCarrera->idCarrera=$fila['idCarrera'];
	$objCarrera->categoria=$fila['categoria'];
	$objCarrera->descripcion=$fila['descripcion'];
	$objCarrera->um=$fila['identificador'];
	$objCarrera->fechaAlta=$fila['fechaEvento'];
	$objCarrera->saldoStock=$fila['distancia'];

$salidaJson = json_encode($objCarrera,JSON_INVALID_UTF8_SUBSTITUTE);

$dbh = null; 

echo $salidaJson;


?>