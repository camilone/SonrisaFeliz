<?php
require("../Conexion/conexion.php");
session_start();

$username = $_POST['nombreLogin'];
$clave = $_POST['claveLogin'];

$datosLogin = login($username,$clave);

$registro = mysqli_fetch_assoc($datosLogin);

if($registro == '')
{
	?>
	<script>
			alert("EL USUARIO INGRESADO [<?php echo $username ?>] NO EXISTE O SU CLAVE ES INCORRECTA");
			window.location='../Layout/Login.php';
	</script>
	<?php
}
else
{
	$_SESSION['id']        = $registro['id'];
	$_SESSION['rut']       = $registro['rut'];
	$_SESSION['nombre']    = $registro['nombre'];
	$_SESSION['tipo_user'] = $registro['tipo_user'];
	
	header("Location: ../Layout/menuPrincipal.php");
	exit();
}