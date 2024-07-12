<?php

include("./datosConexionBase.php");


$bindidCarrera = $_GET['idCarrera'];

$respuesta_estado= "idCarrera: " . $bindidCarrera;

try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	
	$respuesta_estado = $respuesta_estado .  "\n<br />conexion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}





$sql="select deslinde from carreras where idCarrera = :idCarrera";

$respuesta_estado = $respuesta_estado . $sql . "<br />";



try {
	$stmt = $dbh->prepare($sql);	
	$respuesta_estado = $respuesta_estado .  "\n<br />preparacion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}


try {
	$stmt->bindParam(':idCarrera', $bindidCarrera);
	
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



$fila=$stmt->fetch();
$objCarrera = new stdClass();

$objCarrera->deslinde=base64_encode($fila['deslinde']);

$salidaJson = json_encode($objCarrera,JSON_INVALID_UTF8_SUBSTITUTE);

$dbh = null; 

echo $salidaJson;

?>

