<?php
	$idUsuario = $_GET['id'];
	//OBTENER CONTACTOS DE LA BD
	//CREAR CADENA DE CONEXIÓN
	$conexion = new mysqli('localhost','id3997265_u758640150_root','123456','id3997265_u758640150_rate');
	//CREAR LA PETICIÓN
	$datos = "SELECT * FROM usuarios WHERE idUsuario = $idUsuario";

	//EJECUTAR PETICIÓN Y GUARDAR RESPUESTA
	$respuesta = $conexion->query($datos);
	//HACER ARREGLO Y VOLVERLO JSON
	$arreglo = array();

	$puntaje = "SELECT puntos, veces FROM puntuaciones WHERE idUsuario = $idUsuario";
	$respuesta2 = $conexion->query($puntaje);
	$dato2 = $respuesta2->fetch_object();

	while ($dato = $respuesta->fetch_object()) {
		array_push($arreglo, array(
			"idUsuario"=>$dato->idUsuario,
			"nombre"=>utf8_decode($dato->nombreUsuario),
			"correo"=>$dato->correoUsuario,
			"rate"=>$dato2->puntos,
			"veces"=>$dato2->veces
		));
	}
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);
?>