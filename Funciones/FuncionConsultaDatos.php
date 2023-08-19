<?php
require('../Conexion/conexion.php');

$rut = $_GET['rut'];

if($rut != "")
{
	$mostrarDatos = datosCliente($rut);
	$id = 0;

	while($registro = mysqli_fetch_assoc($mostrarDatos))
	{
		$id 		   = $registro['id'];
		$rutCliente    = $registro['rut'];
		$nombre 	   = $registro['nombre'];
		$sistema_salud = $registro['sistema_salud'];
	}
	
	if($id != 0)
	{
		$cod = 1;
		$msj = "Exito";
		$respuesta = array("cod"=>$cod,"Descripcion"=>$msj,"id"=>$id,"rut"=>$rutCliente,"nombre"=>$nombre,"sistema_salud"=>$sistema_salud);
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