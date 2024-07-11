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


//Si viene documento! Sigue abajo"

$respuesta_estado = $respuesta_estado . "<br />\nParte Documento PDF";
/*
$respuesta_estado = $respuesta_estado . "<br />mame: \n" . $_FILES['documentoPdf']['name'];
$respuesta_estado = $respuesta_estado . "<br />type: \n" . $_FILES['documentoPdf']['type'];
$respuesta_estado = $respuesta_estado . "<br />Size: \n" . $_FILES['documentoPdf']['size'];
$respuesta_estado = $respuesta_estado . "<br />tmp_name: \n" . $_FILES['documentoPdf']['tmp_name'];
$respuesta_estado = $respuesta_estado . "<br />error: \n" . $_FILES['documentoPdf']['error'];
*/


if ($_FILES['deslinde']['size']==0) {
	$respuesta_estado=$respuesta_estado . "<br />\nNo ha sido seleccionado file para enviar";
}
else {
	$respuesta_estado=$respuesta_estado . "<br />\nTrae deslinde asociado a idCarrera: " . $idCarrera;
	
	$deslinde = file_get_contents($_FILES['deslinde']['tmp_name']);	
		//EL type de $_FILES['documentoPdf'] no es
		//una variable simple que contiene el nombre
		//del archivo subido desde el input de java script con nombre documentoPdf sino un array (para verlo se 
		//puede usar var_dump(). El elemento name en la 2da dimension de $_FILES si contiene el nombre de archivo 
	 	//original)

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


//$salidaJson = json_encode($respuesta,JSON_INVALID_UTF8_SUBSTITUTE);
//El segundo parametro es para que la función no falle con los caracteres utf8 como acentos y ñ's'

echo $respuesta_estado;
$dbh = null; /*para cerrar la conexion*/

?>