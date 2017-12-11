<?php 
$usuario = $_GET['u'];
$password = $_GET['p'];

$conexion = new mysqli('localhost','root','','rateme');
$checklogin = "SELECT * FROM usuarios WHERE
				correoUsuario = '$usuario' AND pass = '$password'";
$resultados = $conexion->query($checklogin);

if (mysqli_num_rows($resultados)>0) {
	$r = $resultados->fetch_object();
	echo $r->idUsuario;
}else{
	echo "0";
}

?>