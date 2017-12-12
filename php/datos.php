<?php
	$idUsuario = $_GET['id'];
	//OBTENER CONTACTOS DE LA BD
	//CREAR CADENA DE CONEXIÓN
	$conexion = new mysqli('localhost','root','','rateme');
	//CREAR LA PETICIÓN
	$datos = "SELECT * FROM usuarios WHERE idUsuario = $idUsuario";
	//EJECUTAR PETICIÓN Y GUARDAR RESPUESTA
	$respuesta = $conexion->query($datos);
	//HACER ARREGLO Y VOLVERLO JSON
	$arreglo = array();
	while ($dato = $respuesta->fetch_object()) {
		array_push($arreglo, array(
			"idUsuario"=>$dato->idUsuario,
			"nombre"=>utf8_decode($dato->nombreUsuario),
			"correo"=>$dato->correoUsuario
			// "rate"=$usuario->rateUsuario
		));
	}
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);
?>