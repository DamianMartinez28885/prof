<?php
include("./datosConexionBase.php");

$orden=$_GET['orden'];
$fila_id=$_GET['fila_id'];
$fila_categoria=$_GET['fila_categoria'];
$fila_identificador=$_GET['fila_identificador'];
$fila_descripcion=$_GET['fila_descripcion'];
$fila_fechaEvento=$_GET['fila_fechaEvento'];


$respuesta_estado = "Parámetros de entrada del requerimiento HTTP:";
$respuesta_estado = $respuesta_estado . "<h4>Orden: " . $orden . "</h4>"; 
$respuesta_estado = $respuesta_estado . "<h4> fila_id: " . $fila_id . "</h4>";
$respuesta_estado = $respuesta_estado . "<h4> fila_categoria: " . $fila_categoria . "</h4>";
$respuesta_estado = $respuesta_estado . "<h4> fila_identificador: " . $fila_identificador . "</h4>";
$respuesta_estado = $respuesta_estado . "<h4> fila_descripcion: " . $fila_descripcion . "</h4>";
$respuesta_estado = $respuesta_estado . "<h4> fila_fechaEvento: " . $fila_fechaEvento . "</h4>";

try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	
	$respuesta_estado = $respuesta_estado .  "\nCONECTADA";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
}

$sql="select * from carreras where ";

$sql=$sql . "idCarrera LIKE CONCAT('%',:idCarrera,'%') and ";
$sql=$sql . "categoria LIKE CONCAT('%',:categoria,'%') and ";
$sql=$sql . "descripcion LIKE CONCAT('%',:descripcion,'%') and ";
$sql=$sql . "identificador LIKE CONCAT('%',:identificador,'%') and ";
$sql=$sql . "fechaEvento LIKE CONCAT('%',:fechaEvento,'%')";
$sql=$sql . " ORDER BY $orden";

$respuesta_estado = $respuesta_estado . "\nsql string: " . $sql;

$stmt = $dbh->prepare($sql);


$stmt->bindParam(':idCarrera', $fila_id);
$stmt->bindParam(':categoria', $fila_categoria);
$stmt->bindParam(':descripcion', $fila_descripcion);
$stmt->bindParam(':identificador', $fila_identificador);
$stmt->bindParam(':fechaEvento', $fila_fechaEvento);

//Ejecucion de sentencia
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();


$carreras=[];

//Carga del arreglo
While($fila = $stmt->fetch()) {
	$objCarrera = new stdClass();
	$objCarrera->idCarrera=$fila['idCarrera'];
	$objCarrera->identificador=$fila['identificador'];
	$objCarrera->descripcion=$fila['descripcion'];
	$objCarrera->categoria=$fila['categoria'];
	$objCarrera->distancia=$fila['distancia'];
	$objCarrera->fechaEvento=$fila['fechaEvento'];
	
	$respuesta_estado = $respuesta_estado . "\n" . $objCarrera->idCarrera;
	array_push($carreras,$objCarrera);
}

$objCarreras = new stdClass();
$objCarreras->carreras=$carreras;
$objCarreras->cuenta=count($carreras);

$respuesta_estado = $respuesta_estado . "\nTotal de Carreras: " . $objCarreras->cuenta;
$salidaJson = json_encode($objCarreras);
$dbh = null; 
echo $salidaJson;

?>