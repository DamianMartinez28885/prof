<?php

include("./datosConexionBase.php");

$idCarrera = $_POST['idCarrera'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
$identificador = $_POST['identificador'];
$fechaEvento = $_POST['fechaEvento'];
$distancia = $_POST['distancia'];
//$documentoPdf = $_POST['documentoPdf'];


$respuesta_estado = "";


try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	/*Database Handle*/
	$respuesta_estado = $respuesta_estado .  "\nconexion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
}




$respuesta_estado=$respuesta_estado . "\nRespuesta del servidor al alta. Entradas recibidas en el req http:";
$respuesta_estado=$respuesta_estado . "\nidCarrera: " . $idCarrera;
$respuesta_estado=$respuesta_estado . "\ncategoria: " . $categoria;
$respuesta_estado=$respuesta_estado . "\ndescripcion: " . $descripcion;
$respuesta_estado=$respuesta_estado . "\nidentificador: " . $identificador;
$respuesta_estado=$respuesta_estado . "\nfechaEvento: " . $fechaEvento;
$respuesta_estado=$respuesta_estado . "\ndistancia: " . $distancia;


$sql="insert into carreras (idCarrera,categoria,descripcion,identificador,fechaEvento,distancia) values (:idCarrera,:categoria,:descripcion,:identificador,:fechaEvento,:distancia);";


$stmt = $dbh->prepare($sql);

$stmt->bindParam(':idCarrera', $idCarrera);
$stmt->bindParam(':categoria', $categoria);
$stmt->bindParam(':descripcion', $descripcion);
$stmt->bindParam(':identificador', $identificador);
$stmt->bindParam(':fechaEvento', $fechaEvento);
$stmt->bindParam(':distancia', $distancia);

//$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();


//Si viene documento! Sigue abajo

	if (empty($_FILES['deslinde']['name'])) {
		$respuesta_estado = $respuesta_estado . "<br />No ha sido seleccionado ningun file para enviar!";		
	}
	else {
		$respuesta_estado=$respuesta_estado . "Trae deslinde asociado a idCarrera: " . $idCarrera;
		
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
		} 
		catch (PDOException $e) {
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


		//$fila=$stmt->fetch();

	}


/*
$salidaJson = json_encode($respuesta_estado,JSON_INVALID_UTF8_SUBSTITUTE);
//El segundo parametro es para que la función no falle con los caracteres utf8 como acentos y ñ's'
echo $salidaJson;
*/


$dbh = null; /*para cerrar la conexion*/


echo $respuesta_estado;
?>



