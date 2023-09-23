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

function obtenerTA()
{
	$conexion = conectarBD();
	$sql = "SELECT id, nombre FROM tipo_atencion";
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

function ingresoAtencion($idCliente,$idPres,$tipo_atencion,$monto,$fechahora,$presupuesto,$observacion)
{
	$conexion = conectarBD();
	$sql = "INSERT INTO atencion VALUES ('','".$idCliente."','".$idPres."','".$tipo_atencion."','".$monto."','".$presupuesto."','".$fechahora."','".$observacion."')";
	$result = mysqli_query($conexion, $sql);
}

function datosCliente($rut)
{
	$conexion = conectarBD();
	$sql = "SELECT c.id AS id, c.rut AS rut, CONCAT(c.nombre, ' ', c.primer_apellido, ' ', c.segundo_apellido) AS nombre, ss.nombre AS sistema_salud
			FROM cliente c
			INNER JOIN sistema_salud ss ON ss.id_salud = c.sistema_salud
			WHERE c.rut = '".$rut."'";
	$result = mysqli_query($conexion, $sql);
	
	return $result;
}

function datosClienteFull($rut)
{
	$conexion = conectarBD();
	$sql = "SELECT  c.id AS id, 
					c.rut AS rut, 
					c.nombre AS nombre, 
					c.primer_apellido AS primer_apellido, 
					c.segundo_apellido AS segundo_apellido, 
					ss.id_salud AS id_sistema_salud,
					ss.nombre AS sistema_salud, 
					c.email AS email, 
					c.telefono AS telefono, 
					c.direccion AS direccion
			FROM cliente c
			INNER JOIN sistema_salud ss ON ss.id_salud = c.sistema_salud
			WHERE c.rut = '".$rut."'";
	$result = mysqli_query($conexion, $sql);
	
	return $result;
}

function informeTransaccion($fechaIni,$fechaFin)
{
	$conexion = conectarBD();
	$sql = "SELECT c.rut AS rut_cliente,CONCAT(c.nombre, ' ', c.primer_apellido, ' ', c.segundo_apellido) AS nombre_cliente, p.rut AS rut_prestador, p.nombre AS nombre_prestador, 
			t.nombre AS atencion, a.monto AS monto, a.fecha_atencion AS fecha_atencion, a.observaciones AS observaciones
			FROM atencion a
			INNER JOIN cliente c ON c.id = a.id_cliente
			INNER JOIN prestador p ON p.id_usuario = a.id_prestador
			INNER JOIN tipo_atencion t ON t.id = a.tipo_atencion
			WHERE DATE(a.fecha_atencion) BETWEEN '".$fechaIni."' AND '".$fechaFin."'";
	$result = mysqli_query($conexion, $sql);
	
	return $result;
}

function editarCliente($id,$rut,$email,$fono,$nombre,$apellidoPat,$apellidoMat,$direccion,$sistema_salud)
{
	$conexion = conectarBD();
	$sql = "UPDATE cliente SET rut = '".$rut."', nombre = '".$nombre."', primer_apellido = '".$apellidoPat."', segundo_apellido = '".$apellidoMat."', telefono = '".$fono."', email = '".$email."', direccion = '".$direccion."', sistema_salud = '".$sistema_salud."' WHERE id = '".$id."'";
	$result = mysqli_query($conexion, $sql);
}

function informeContableDebe($fechaIni,$fechaFin)
{
	$conexion = conectarBD();
	$sql = "SELECT '5-10-10-040' AS cuenta_contable, a.monto AS monto, c.rut AS rut_cliente, p.rut AS rut_prestador, DATE(a.fecha_atencion) AS fecha_atencion, cc.centro_costo AS centro_costo
			FROM atencion a
			INNER JOIN prestador p ON p.id_usuario = a.id_prestador
			INNER JOIN centro_costo cc ON cc.id_prestador = p.id
			INNER JOIN cliente c ON c.id = a.id_cliente
			WHERE DATE(a.fecha_atencion) BETWEEN '".$fechaIni."' AND '".$fechaFin."'";
	$result = mysqli_query($conexion, $sql);
	
	return $result;
}

function informeContableHaber($fechaIni,$fechaFin)
{
	$conexion = conectarBD();
	$sql = "SELECT cc.cuenta_contable AS cuenta_contable, SUM(a.monto) AS monto, p.rut AS rut_prestador, DATE(a.fecha_atencion) AS fecha_atencion
			FROM atencion a
			INNER JOIN prestador p ON p.id_usuario = a.id_prestador
			INNER JOIN centro_costo cc ON cc.id_prestador = p.id
			WHERE DATE(a.fecha_atencion) BETWEEN '".$fechaIni."' AND '".$fechaFin."'
			GROUP BY a.id_prestador";
			
	$result = mysqli_query($conexion, $sql);
	
	return $result;	
}
?>