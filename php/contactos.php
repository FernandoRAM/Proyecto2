<?php
	//OBTENER CONTACTOS DE LA BD
	//CREAR CADENA DE CONEXIÓN
	$conexion = new mysqli('localhost','root','','rateme');
	//CREAR LA PETICIÓN
	$contactos = "SELECT * FROM usuarios";
	//EJECUTAR PETICIÓN Y GUARDAR RESPUESTA
	$respuesta = $conexion->query($contactos);
	//HACER ARREGLO Y VOLVERLO JSON
	$arreglo = array();
	while ($contacto = $respuesta->fetch_object()) {
		array_push($arreglo, array(
			"nombre"=>utf8_decode($contacto->nombreUsuario),
			"id"=>$contacto->idUsuario,
			// "rate"=>$contacto->rate
		));
	}
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);
?>