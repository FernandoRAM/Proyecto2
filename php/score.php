<?php 
	
	//OBTENER CONTACTOS DE LA BD
	//CREAR CADENA DE CONEXIÓN
	$nuevoRate = $_POST('rate');
	$nombreUsuario = $_POST('usuario')
	$conexion = new mysqli('localhost','root','','rateme');
	//CREAR LA PETICIÓN
	$queryUsuario = "SELECT idUsuario FROM puntuaciones WHERE idUsuario = '$nombreUsuario'";
	$idUsuario = $conexion->query($score);

	$queryScore = "SELECT puntos FROM puntuaciones WHERE idUsuario = '$idUsuario'";
	$score = $conexion->query($score);

	$queryVeces = "SELECT veces FROM puntuaciones WHERE idUsuario = '$idUsuario'";
	$veces = $conexion->query($score);

	//calcular nuevo score
	$respuesta = $conexion->query($score);

	$nuevoScore = ($score + $nuevoRate)/$veces;

	//almacenar score nuevo
	$queryGuardar = "INSERT INTO puntuaciones ('puntos','veces') VALUES ($score, $veces+1)";
	$conexion->query($score);

}