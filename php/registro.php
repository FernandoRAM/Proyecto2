<?php 
$usuario = $_GET['u'];
$password = $_GET['p'];
$correo = $_GET['c'];
 //REGISTRO
		$conexion = new mysqli('localhost','id3997265_u758640150_root','123456','id3997265_u758640150_rate');
		
		$registro = "INSERT INTO usuarios (nombreUsuario, correoUsuario, pass) VALUES ('$usuario', '$correo', '$password')";
		$resultados = $conexion->query($registro);

		echo "1";

?>