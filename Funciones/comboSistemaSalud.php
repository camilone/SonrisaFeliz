<?php
require('../Conexion/conexion.php');

$listaPrest = obtenerSS();

if ($listaPrest != '')
{
	$sistema_salud = "";
	while ($rowPrest = mysqli_fetch_assoc($listaPrest))
	{
		if($rowPrest['id_salud'] != "")
		{
			$opcion = "<option value=''>Selecciona una opción</option>";
			$sistema_salud .="<option value=".$rowPrest['id_salud'].">".$rowPrest['nombre']."</option>"; //Combo que contiene info del titular cuando no tiene cargas.
		}
	}
}

$sistema_salud = $opcion.$sistema_salud;
$respuesta = array("sistema_salud"=>$sistema_salud);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($respuesta);
exit();