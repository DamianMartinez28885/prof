<?php
session_start(); 

if (!isset($_SESSION['identificativo'])) { 
		header('Location:./formularioDeLogin.html');
    	
    	exit;  	
}
?>