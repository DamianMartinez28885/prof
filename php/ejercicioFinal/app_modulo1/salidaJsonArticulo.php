<?php
include('../manejoSesion.inc');
//sleep(1);
//Este script trae un solo usuario para llenar la ficha modi.
include("./datosConexionBase.php");
//Abre conexion con el motor de base de datos

//date_default_timezone_get();
$hoy = date("Y-m-d H:i:s");
$respuesta_estado=$hoy . "\n";

$idCarrera=$_GET['idCarrera'];



try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	/*Database Handle*/
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
//$fila=$resultado->fetch_assoc();



$objArticulo = new stdClass();
	$objArticulo->idCarrera=$fila['idCarrera'];
	$objArticulo->categoria=$fila['categoria'];
	$objArticulo->descripcion=$fila['descripcion'];
	$objArticulo->um=$fila['identificador'];
	$objArticulo->fechaAlta=$fila['fechaEvento'];
	$objArticulo->saldoStock=$fila['distancia'];


//$puntero = fopen("./errores.log","a");
//fwrite($puntero, $respuesta_estado);
//fwrite($puntero, "\n");
//fclose($puntero);


$salidaJson = json_encode($objArticulo,JSON_INVALID_UTF8_SUBSTITUTE);
//El segundo parametro es para que la función no falle con los caracteres utf8 como acentos y ñ's'

$dbh = null; /*para cerrar la conexion*/

echo $salidaJson;

//echo $respuesta_estado;

?>