<?php

include("./datosConexionBase.php");

$idCarrera = $_POST['idCarrera'];
$identificador = $_POST['identificador'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$fechaEvento = $_POST['fechaEvento'];
$distancia = $_POST['distancia'];
//$documentoPdf = $_POST['documentoPdf'];

$respuesta_estado = "";


try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	
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


$sql="insert into 'carreras' (idCarrera,identificador,descripcion,categoria,distancia,fechaEvento) values (:idCategoria,:identificador,:descripcion,:categoria,:fechaEvento,:distancia);";


$stmt = $dbh->prepare($sql);

$stmt->bindParam(':idCarrera', $idCarrera);
$stmt->bindParam(':identificador', $identificador);
$stmt->bindParam(':descripcion', $descripcion);
$stmt->bindParam(':categoria', $categoria);
$stmt->bindParam(':fechaEvento', $fechaEvento);
$stmt->bindParam(':distancia', $distancia);

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();




	if (empty($_FILES['documentoPdf']['name'])) {
		$respuesta_estado = $respuesta_estado . "<br />No ha sido seleccionado ningun file para enviar!";		
	}
	else {
		$respuesta_estado=$respuesta_estado . "Trae documentoPdf asociado a idCarrera: " . $idCarrera;
		
		$contenidoPdf = file_get_contents($_FILES['documentoPdf']['tmp_name']);	
		$sql="update carreras set documentoPdf=:contenidoPdf where idCarrera=:idCarrera;";

		try {
			$stmt = $dbh->prepare($sql);	
			$respuesta_estado = $respuesta_estado .  "\n<br />preparacion exitosa";
		} 
		catch (PDOException $e) {
			$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
		}

		try {
			$stmt->bindParam(':idCarrera', $idCarrera);
			$stmt->bindParam(':contenidoPdf', $contenidoPdf);
	
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



$salidaJson = json_encode($respuesta_estado,JSON_INVALID_UTF8_SUBSTITUTE);



$dbh = null; 


echo $respuesta_estado;
?>



