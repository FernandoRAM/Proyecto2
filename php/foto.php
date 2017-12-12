<?php
	$idUsuario = $_GET['id'];
	//OBTENER CONTACTOS DE LA BD
	//CREAR CADENA DE CONEXIÓN
	$conexion = new mysqli('localhost','root','','rateme');
	//CREAR LA PETICIÓN
	$fotos = "SELECT * FROM fotos WHERE idUsuario = $idUsuario";
	//EJECUTAR PETICIÓN Y GUARDAR RESPUESTA
	$respuesta = $conexion->query($fotos);
	//HACER ARREGLO Y VOLVERLO JSON
	$arreglo = array();
	while ($foto = $respuesta->fetch_object()) {
		array_push($arreglo, array(
			"idUsr"=>$foto->idUsuario,
			"direccion"=>utf8_decode($foto->foto),
			"idFoto"=>$foto->idFoto
			// "rate"=$usuario->rateUsuario
		));
	}
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);
?>