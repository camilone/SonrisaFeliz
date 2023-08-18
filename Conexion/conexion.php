<?php
function conectarBD()
{
	$server = "localhost";
	$usuario = "root";
	$pass = "";
	$BD = "SonrisaFeliz";
	
	//Variable que guarda la conexion a la BD
	$conexion = mysqli_connect($server,$usuario,$pass,$BD);
	
	/*Utilizamos esta funcion para transformar la salida a LATINO*/
	$conexion->set_charset('utf8');
	
	//Comprobamos si la conexion fue exitosa
	IF(!$conexion)
	{
		echo 'Ha ocurrido un error inesperado en la conexion a la BD';
	}
	
	//echo 'No ha ocurrido un error inesperado en la conexion a la BD';
	return $conexion;
}

function login($username,$clave)
{
	$conexion = conectarBD();
	$sql = "SELECT id, rut, nombre, tipo_user FROM usuario WHERE estado = 1 AND user = '".$username."' AND contraseña = '".$clave."'";
	$result = mysqli_query($conexion, $sql);
	
	return $result;
}

function obtenerSS()
{
	$conexion = conectarBD();
	$sql = "SELECT id_salud, nombre FROM sistema_salud";
	$result = mysqli_query($conexion, $sql);
	
	return $result;
}

function validaRut($rut)
{
	$conexion = conectarBD();
	$sql = "SELECT rut FROM cliente WHERE rut = '".$rut."' AND estado = 1";
	$result = mysqli_query($conexion, $sql);
	
	return $result;
}

function ingresoCliente($rut,$email,$fono,$nombre,$apellidoPat,$apellidoMat,$direccion,$sistema_salud)
{
	$conexion = conectarBD();
	$sql = "INSERT INTO cliente VALUES ('','".$rut."','".$nombre."','".$apellidoPat."','".$apellidoMat."','".$fono."','".$email."','".$direccion."','".$sistema_salud."',1,NOW())";
	$result = mysqli_query($conexion, $sql);
}
?>