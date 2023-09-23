<?php
require('../Conexion/conexion.php');

$rut = $_GET['rut'];

if($rut != "")
{
	$mostrarDatos = datosClienteFull($rut);
	$id = 0;

	while($registro = mysqli_fetch_assoc($mostrarDatos))
	{
		$id 		   = $registro['id'];
		$rutCliente    = $registro['rut'];
		$nombre 	   = $registro['nombre'];
		$pr_apellido   = $registro['primer_apellido'];
		$se_apellido   = $registro['segundo_apellido'];
		$id_ss		   = $registro['id_sistema_salud'];
		$sistema_salud = $registro['sistema_salud'];
		$telefono	   = $registro['telefono'];
		$direccion	   = $registro['direccion'];
		$email 		   = $registro['email'];
	}
	
	if($id != 0)
	{
		$cod = 1;
		$msj = "Exito";
		$respuesta = array("cod"=>$cod,"Descripcion"=>$msj,"id"=>$id,"rut"=>$rutCliente,"nombre"=>$nombre,"pr_apellido"=>$pr_apellido,"se_apellido"=>$se_apellido,"telefono"=>$telefono,"direccion"=>$direccion,"email"=>$email,"id_ss"=>$id_ss,"sistema_salud"=>$sistema_salud);
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($respuesta);
		exit();
	}
	else
	{
		$cod = 0;
		$msj = "Cliente no registrado.";
		$respuesta = array("cod"=>$cod,"Descripcion"=>$msj);
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($respuesta);
		exit();		
	}
}
else
{
	$cod = 0;
	$msj = "Cliente no registrado.";
	$respuesta = array("cod"=>$cod,"Descripcion"=>$msj);
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($respuesta);
	exit();	
}