<?php
	//OBTENER CONTACTOS DE LA BD
	//CREAR CADENA DE CONEXIÓN
	$id = $_GET['id'];
	$conexion = new mysqli('localhost','id3997265_u758640150_root','123456','id3997265_u758640150_rate');
	//CREAR LA PETICIÓN
	$contactos = "SELECT puntos FROM puntuaciones WHERE idUsuario = '$id'";
	//EJECUTAR PETICIÓN Y GUARDAR RESPUESTA
	$respuesta = $conexion->query($contactos);
	//HACER ARREGLO Y VOLVERLO JSON
	$arreglo = array();
	while ($contacto = $respuesta->fetch_object()) {
		array_push($arreglo, array(
			"rate"=>$contacto->puntos
		));
	}
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);
?>