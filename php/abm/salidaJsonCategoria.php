<?php
//sleep(1);
include("./datosConexionBase.php");

$respuesta_estado="";

$sql="select * from categorias";



try {
	$dsn = "mysql:host=$host;dbname=$dbname";
	$dbh = new PDO($dsn, $user, $password);	/*Database Handle*/
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



//$fila=$stmt->fetch();


$familias=[];

while($fila=$stmt->fetch()) {
	$objFamilia= new stdclass;
	$objFamilia->codFamilia=$fila['idCategoria'];
	$objFamilia->descripcionFamilia=$fila['descripcion'];
	array_push($familias, $objFamilia);
}




$objFamilias=new stdclass();
$objFamilias->familias=$familias;

$salidaJson=json_encode($objFamilias,JSON_INVALID_UTF8_SUBSTITUTE);

$dbh = null; /*para cerrar la conexion*/

echo $salidaJson;
?>