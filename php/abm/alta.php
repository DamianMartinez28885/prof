<?php

include("./datosConexionBase.php");

$idCarrera = $_POST['idCarrera'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
$identificador = $_POST['identificador'];
$fechaEvento = $_POST['fechaEvento'];
$distancia = $_POST['distancia'];

$respuesta_estado = "";

try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	
	$respuesta_estado = $respuesta_estado .  "\nconexion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
}

$respuesta_estado=$respuesta_estado . "\nRespuesta del servidor. Entradas recibidas ";
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

$stmt->execute();

	if (empty($_FILES['deslinde']['name'])) {
		$respuesta_estado = $respuesta_estado . "<br />No hay PDF de deslinde";		
	}
	else {
		$respuesta_estado=$respuesta_estado . "Trae deslinde de idCarrera: " . $idCarrera;
		
		$deslinde = file_get_contents($_FILES['deslinde']['tmp_name']);	
		
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
}

$dbh = null;

echo $respuesta_estado;
?>



