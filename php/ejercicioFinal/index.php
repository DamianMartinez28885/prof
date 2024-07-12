<?php
session_start();
if (!isset($_SESSION['identificativo'])) { 
    	header('Location:./formularioDeLogin.html');
    	exit; 
}
include('./libreria.');
echo infoDeSesion();

?>
<button id="btAppMod1" >Ir a la APP</button>
<button id="btAppFinSesion" >Terminar sesión</button>

<script>
document.getElementById("btAppMod1").onclick=function(){
	location.href="./app";
}

document.getElementById("btAppFinSesion").onclick=function(){
	location.href="./destruirsesion.php";
}
</script>
