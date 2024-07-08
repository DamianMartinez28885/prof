<?php
session_start();
if (!isset($_SESSION['identificativo'])) { 
    	header('Location:./formularioDeLogin.html');
    	exit; 
}
include('./libreria.php');
echo infoDeSesion();

?>
<button id="btAppMod1" >Ingrese al módulo 1 de la app</button>
<button id="btAppFinSesion" >Terminar sesión</button>

<script>
document.getElementById("btAppMod1").onclick=function(){
	location.href="./app_modulo1";
}

document.getElementById("btAppFinSesion").onclick=function(){
	location.href="./destruirsesion.php";
}
</script>
