<?php
session_start(); 
include('libreria.inc');
include('datosConexionBase.php');

$varLogin=$_POST['login'];
$varClave=$_POST['clave'];

$salidaParaLog = "Salida para log: <br/>";
$salidaParaLog = $salidaParaLog . $varLogin;
$salidaParaLog = $salidaParaLog . "<br />";
$salidaParaLog = $salidaParaLog . $varClave;
$salidaParaLog = $salidaParaLog . "<br />";

if (!isset($_SESSION['identificativo'])) {

	$salidaParaLog = $salidaParaLog . "Usuario se encuentra fuera de sesion, luego pasamos a autenticar:";
	$salidaParaLog = $salidaParaLog . "<br />";

	if (!autenticacion($varLogin,$varClave)) { 
		header('Location: ./formularioDeLogin.html');
		exit();
	}

	$salidaParaLog = $salidaParaLog . "El Usuario fue autenticado";
	$salidaParaLog = $salidaParaLog . "<br />";
	$_SESSION['identificativo'] = session_create_id();
	$_SESSION['login']=$varLogin;	

	try {
		$dsn = "mysql:host=$host;dbname=$dbname";
		$dbh = new PDO($dsn, $user, $password);
		$salidaParaLog = $salidaParaLog .  "<br />conexion exitosa a la base para tomar nro de contador";
	} 
	catch (PDOException $e) {
		$salidaParaLog = $salidaParaLog . "<br />Codigo de error en el acceso a la base para levantar nro de contador" . $e->getMessage();
	}


	$sql="select * from usuarios where loginDeUsuario=:loginDeUsuario";

	$stmt = $dbh->prepare($sql);

	$stmt->setFetchMode(PDO::FETCH_ASSOC);

	$stmt->bindParam(':loginDeUsuario', $varLogin);


	$stmt->execute();

	$fila = $stmt->fetch();

	$contador = $fila['contador'];

	$salidaParaLog = $salidaParaLog .  "<br />Nro de contador: " . $contador;

	$contador = $contador +1; 
	$_SESSION['contador'] = $contador;

	$salidaParaLog = $salidaParaLog .  "<br />Nro de contador +1: " . $contador;

$sql="update usuarios set contador=:contador where loginDeUsuario=:loginDeUsuario;";

$stmt = $dbh->prepare($sql);

$stmt->bindParam(':loginDeUsuario', $varLogin);
$stmt->bindParam(':contador', $contador);

try {
	$stmt->execute();	
	$salidaParaLog = $salidaParaLog .  "<br />Nro de contador en la ejecucion: " . $contador;
} catch (PDOException $e) {
	$respuesta_estado = $respuesta_estado . "\n<br />" . $e->getMessage();
}


}

//Aqui estamos si la sesión estaba iniciada con anterioridad

//echo $salidaParaLog;

infoDeSesion();
?>
<button id="btAppMod1" style="background-color: #1877f2; color: #fff; border: none; padding: 10px 20px; border-radius: 7px; cursor: pointer;">INGRESAR AL PROGRAMA</button>
<button id="btAppFinSesion" style="background-color: #1877f2; color: #fff; border: none; padding: 10px 20px; border-radius: 7px; cursor: pointer;">CERRAR SECION</button>

<script>
document.getElementById("btAppMod1").onclick=function(){
	location.href="./app_modulo1";
}

document.getElementById("btAppFinSesion").onclick=function(){
	location.href="./destruirsesion.php";
}
</script>