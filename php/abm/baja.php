<?php

include("./datosConexionBase.php");

$bindidCarrera = $_GET['idCarrera'];

$respuesta_estado = "idCarrera pasado: " . $bindidCarrera;


try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	
	$respuesta_estado = $respuesta_estado .  "\nConexion exitosa!";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
}




$sql = "delete from carreras where idCarrera=:idCarrera;";


try {
	$stmt = $dbh->prepare($sql);
	$respuesta_estado = $respuesta_estado . "\nPreparacion exitosa!";
	try {
		$stmt->bindParam(':idCarrera', $bindidCarrera);
		$respuesta_estado = $respuesta_estado . "\nBinding exitoso!";
		try {
			$stmt->execute();
			$respuesta_estado = $respuesta_estado . "\nEjecucion exitosa!";
		} catch (PDOException $e) {
			$respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
		}

	} catch (PDOException $e) {
		$respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
	}

} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
}








$puntero = fopen("./errores.log","a");
fwrite($puntero, $respuesta_estado);
$fecha = date("Y-m-d");
fwrite($puntero, date("Y-m-d H-i") . " ");
fwrite($puntero, "\n");
fclose($puntero);

$dbh = null; /*para cerrar la conexion*/


echo $respuesta_estado;


?>

