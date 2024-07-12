<?php

include("./datosConexionBase.php");

$respuesta_estado="";

$sql="select * from categorias";



try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	
	$respuesta_estado = $respuesta_estado .  "\nconexion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n" . $e->getMessage();
}

$stmt = $dbh->prepare($sql);

try {
	$stmt->execute();	
	$respuesta_estado = $respuesta_estado .  "\n<br /> ejecucion exitosa";
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}



$categorias=[];

while($fila=$stmt->fetch()) {
	$objCategoria= new stdclass;
	$objCategoria->codCategoria=$fila['idCategoria'];
	$objCategoria->descripcionCategoria=$fila['descripcion'];
	array_push($categorias, $objCategoria);
}




$objCategorias=new stdclass();
$objCategorias->categorias=$categorias;

$salidaJson=json_encode($objCategorias,JSON_INVALID_UTF8_SUBSTITUTE);

$dbh = null; 

echo $salidaJson;
?>