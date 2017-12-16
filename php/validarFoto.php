<?php

	$idusuario = $_GET['id'];
	//OBTENER CONTACTOS DE LA BD
	//CREAR CADENA DE CONEXIÃN
	$conexion = new mysqli('localhost','id3997265_u758640150_root','123456','id3997265_u758640150_rate');
	//CREAR LA PETICIÃN
	$contactos = "SELECT * FROM fotos WHERE idUsuario = '$idusuario'";
	//EJECUTAR PETICIÃN Y GUARDAR RESPUESTA
	$respuesta = $conexion->query($contactos);
	//HACER ARREGLO Y VOLVERLO JSON
	$cantidad = mysqli_num_rows($respuesta);
if ($cantidad>0) {
	echo"no";
}else{
	echo"si";
}
?>