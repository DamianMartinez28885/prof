<?php
include("./datosConexionBase.php");
//sleep(1);


$codArt=$_POST['codArt'];
$familia = $_POST['familia'];
$descripcion = $_POST['descripcion'];
$um = $_POST['um'];
$fechaAlta = $_POST['fechaAlta'];
$saldoStock = $_POST['saldoStock'];



$respuesta_estado = "Parte Modificacion simple de datos <br />\n";


$sql="update articulos set codArt=:codArt,familia=:familia,descripcion=:descripcion,um=:um,fechaAlta=:fechaAlta,saldoStock=:saldoStock where codArt=:codArt;";


try { //Se usa el try porque la creación de un objeto PDO puede generar excepciones
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	/*Database Handle*/
	$respuesta_estado = $respuesta_estado .  "\n<br />conexion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}



	$stmt = $dbh->prepare($sql);	
	$respuesta_estado = $respuesta_estado .  "\n<br />preparacion exitosa";

	$stmt->bindParam(':codArt', $codArt);
	$stmt->bindParam(':familia', $familia);
	$stmt->bindParam(':descripcion', $descripcion);
	$stmt->bindParam(':um', $um);
	$stmt->bindParam(':fechaAlta', $fechaAlta);
	$stmt->bindParam(':saldoStock', $saldoStock);	
	$respuesta_estado = $respuesta_estado .  "\n<br /> bind exitosa";


	$stmt->execute();	
	$respuesta_estado = $respuesta_estado .  "\n<br /> ejecucion exitosa";


//Si viene documento! Sigue abajo"

$respuesta_estado = $respuesta_estado . "<br />\nParte Documento PDF";
/*
$respuesta_estado = $respuesta_estado . "<br />mame: \n" . $_FILES['documentoPdf']['name'];
$respuesta_estado = $respuesta_estado . "<br />type: \n" . $_FILES['documentoPdf']['type'];
$respuesta_estado = $respuesta_estado . "<br />Size: \n" . $_FILES['documentoPdf']['size'];
$respuesta_estado = $respuesta_estado . "<br />tmp_name: \n" . $_FILES['documentoPdf']['tmp_name'];
$respuesta_estado = $respuesta_estado . "<br />error: \n" . $_FILES['documentoPdf']['error'];
*/


if ($_FILES['documentoPdf']['size']==0) {
	$respuesta_estado=$respuesta_estado . "<br />\nNo ha sido seleccionado file para enviar";
}
else {
	$respuesta_estado=$respuesta_estado . "<br />\nTrae documentoPdf asociado a codArt: " . $codArt;
	
	$contenidoPdf = file_get_contents($_FILES['documentoPdf']['tmp_name']);	
		//EL type de $_FILES['documentoPdf'] no es
		//una variable simple que contiene el nombre
		//del archivo subido desde el input de java script con nombre documentoPdf sino un array (para verlo se 
		//puede usar var_dump(). El elemento name en la 2da dimension de $_FILES si contiene el nombre de archivo 
	 	//original)

	$sql="update articulos set documentoPdf=:contenidoPdf where codArt=:codArt;";
	

		$stmt = $dbh->prepare($sql);	
		$respuesta_estado = $respuesta_estado .  "\n<br />preparacion exitosa";


$stmt->bindParam(':codArt', $codArt);
$stmt->bindParam(':contenidoPdf', $contenidoPdf);	

$respuesta_estado = $respuesta_estado .  "\n<br /> bind exitosa";


$stmt->execute();	
$respuesta_estado = $respuesta_estado .  "\n<br /> ejecucion exitosa";

}


//$salidaJson = json_encode($respuesta,JSON_INVALID_UTF8_SUBSTITUTE);
//El segundo parametro es para que la función no falle con los caracteres utf8 como acentos y ñ's'

echo $respuesta_estado;
$dbh = null; /*para cerrar la conexion*/

?>