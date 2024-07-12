<?php
//include('../manejoSesion.inc');
include("./datosConexionBase.php");

$idCarrera=$_POST['idCarrera'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
$identificador = $_POST['identificador'];
$fechaEvento = $_POST['fechaEvento'];
$distancia = $_POST['distancia'];



$respuesta_estado = "Parte Modificacion simple de datos <br />\n";



$sql="update carreras set idCarrera=:idCarrera,categoria=:categoria,descripcion=:descripcion,identificador=:identificador,fechaEvento=:fechaEvento,distancia=:distancia where idCarrera=:idCarrera;";


try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	/*Database Handle*/
	$respuesta_estado = $respuesta_estado .  "\n<br />conexion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}


try {
	$stmt = $dbh->prepare($sql);	
	$respuesta_estado = $respuesta_estado .  "\n<br />preparacion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}


try {
	$stmt->bindParam(':idCarrera', $idCarrera);
	$stmt->bindParam(':categoria', $categoria);
	$stmt->bindParam(':descripcion', $descripcion);
	$stmt->bindParam(':identificador', $identificador);
	$stmt->bindParam(':fechaEvento', $fechaEvento);
	$stmt->bindParam(':distancia', $distancia);	
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

$respuesta_estado = $respuesta_estado . "<br />\nParte Documento PDF";

if ($_FILES['deslinde']['size']==0) {
	$respuesta_estado=$respuesta_estado . "<br />\nNo ha sido seleccionado file para enviar";
}
else {
	$respuesta_estado=$respuesta_estado . "<br />\nTrae deslinde asociado a idCarrera: " . $idCarrera;
	
	$deslinde = file_get_contents($_FILES['deslinde']['tmp_name']);	
	
	$sql="update carreras set deslinde=:deslinde where idCarrera=:idCarrera;";
	
	try {
		$stmt = $dbh->prepare($sql);	
		$respuesta_estado = $respuesta_estado .  "\n<br />preparacion exitosa";
	} catch (PDOException $e) {
		$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
	}


	try {
		$stmt->bindParam(':idCarrera', $idCarrera);
		$stmt->bindParam(':deslinde', $deslinde);	

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

}

echo $respuesta_estado;
$dbh = null; 

?>