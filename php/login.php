<?php 
$usuario = $_GET['u'];
$password = $_GET['p'];

$conexion = new mysqli('localhost','id3997265_u758640150_root','123456','id3997265_u758640150_rate');
$checklogin = "SELECT * FROM usuarios WHERE
				correoUsuario = '$usuario' AND pass = '$password'";
// echo($checklogin);
$resultados = $conexion->query($checklogin);

if (mysqli_num_rows($resultados)>0) {
	$r = $resultados->fetch_object();
	echo $r->idUsuario;
}else{
	echo "0";
}

?>