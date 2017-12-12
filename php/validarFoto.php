<?php

	$idusuario = $_GET['id'];
	//OBTENER CONTACTOS DE LA BD
	//CREAR CADENA DE CONEXIÓN
	$conexion = new mysqli('localhost','root','','rateme');
	//CREAR LA PETICIÓN
	$contactos = "SELECT * FROM fotos WHERE idUsuario = '$idusuario'";
	//EJECUTAR PETICIÓN Y GUARDAR RESPUESTA
	$respuesta = $conexion->query($contactos);
	//HACER ARREGLO Y VOLVERLO JSON
	$cantidad = mysqli_num_rows($respuesta);
if ($cantidad>0) {
	echo"no";
}else{
	echo"si";
}
?>