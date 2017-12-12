<?php 
$usuario = $_GET['u'];
$password = $_GET['p'];
$correo = $_GET['c'];
 //REGISTRO
		$conexion = new mysqli('localhost','root','','rateme');
		$registro = "INSERT INTO usuarios (nombreUsuario, correoUsuario, pass) VALUES ('$usuario', '$correo', '$password')";
		echo($registro);
		$resultados = $conexion->query($registro);
		echo"1";

?>