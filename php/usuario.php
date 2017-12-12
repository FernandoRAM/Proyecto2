<?php
	$idUsuario = $_GET['id'];
	//OBTENER CONTACTOS DE LA BD
	//CREAR CADENA DE CONEXIÓN
	$conexion = new mysqli('localhost','root','','rateme');
	//CREAR LA PETICIÓN
	$contactos = "SELECT * FROM usuarios WHERE idUsuario = $idUsuario";
	//EJECUTAR PETICIÓN Y GUARDAR RESPUESTA
	$respuesta = $conexion->query($contactos);
	//HACER ARREGLO Y VOLVERLO JSON
	$arreglo = array();
	while ($usuario = $respuesta->fetch_object()) {
		array_push($arreglo, array(
			"foto"=>$usuario->foto,
			"nombre"=>utf8_decode($usuario->nombreUsuario),
			"id"=>$usuario->idUsuario
			// "rate"=$usuario->rateUsuario
		));
	}
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);
?>