<?php 
	
	//OBTENER CONTACTOS DE LA BD
	//CREAR CADENA DE CONEXIÓN
	$nuevoRate = $_GET['rate'];
	$nombreUsuario = $_GET['id'];
	$conexion = new mysqli('localhost','id3997265_u758640150_root','123456','id3997265_u758640150_rate');
	
	//CREAR LA PETICIÓN
	$query = "SELECT * FROM puntuaciones WHERE idUsuario = '$nombreUsuario'";
	echo $query;
	$respuesta = $conexion->query($query);

	$arreglo = array();
	while ($dato = $respuesta->fetch_object()) {
		array_push($arreglo, array(
			"puntos"=>$dato->puntos,
			"veces"=>$dato->veces
			// "rate"=$usuario->rateUsuario
		));
	}

	//calcular nuevo score
	

	$veces = $arreglo[0]['veces'];
	$nuevoScore = $arreglo[0]['puntos'] + $nuevoRate;
	$nuevasVeces = $veces+1;
	//almacenar score nuevo
	$queryGuardar = "UPDATE puntuaciones SET puntos = $nuevoScore, veces = $nuevasVeces WHERE idUsuario = $nombreUsuario";
	echo $queryGuardar;
	$conexion->query($queryGuardar);

?>