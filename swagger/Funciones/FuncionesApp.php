<?php
/**
 * @SWG\Info(title="Sonrisa Feliz", version="4.0")
 */
require('Conexion/Conexion.php');

/**
 * @SWG\Get(
 *		 path="/SonrisaFeliz/swagger/consultaCliente.php?rut={rut}",
 *		 tags={"Endpoint"},
 *     summary="Consulta datos de un cliente",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * @SWG\Parameter(
 *     name="rut",
 *     in="path",
 *		 type="string",
 *     description="Rut a consultar.",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="integer",
 *            @SWG\Property(property="rut", type="string"),
 *     )
 * ),
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function consultaClientes($rut)
{
	$data = datosClienteFull($rut);
	while($registro = mysqli_fetch_assoc($data))
	{
		$datos[] = $registro;
	}
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res, "Datos" => $datos);
	$json = json_encode($data);
	
	return $json;
}

/**
 * @SWG\Post(
 *		 path="/SonrisaFeliz/swagger/crearCliente.php",
 *		 tags={"Endpoint"},
 *     summary="Creación de Clientes",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     description="",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="object",
 *               @SWG\Property(property="rut", type="string"),
 *               @SWG\Property(property="nombre", type="string"),
 *               @SWG\Property(property="apellidoPat", type="string"),
 *               @SWG\Property(property="apellidoMat", type="string"),
 *               @SWG\Property(property="direccion", type="string"),
 *               @SWG\Property(property="fono", type="string"),
 *               @SWG\Property(property="sistema_salud", type="string"),
 *               @SWG\Property(property="email", type="string"),
 *
 * 		)
 * ),
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function creacionClientes($rut,$email,$fono,$nombre,$apellidoPat,$apellidoMat,$direccion,$sistema_salud)
{
	ingresoCliente($rut,$email,$fono,$nombre,$apellidoPat,$apellidoMat,$direccion,$sistema_salud);
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res);
	$json = json_encode($data);
	
	return $json;
}

/**
 * @SWG\Post(
 *		 path="/SonrisaFeliz/swagger/editarCliente.php",
 *		 tags={"Endpoint"},
 *     summary="Edición de Clientes",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     description="",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="object",
 *               @SWG\Property(property="id", type="string"),
 *               @SWG\Property(property="rut", type="string"),
 *               @SWG\Property(property="nombre", type="string"),
 *               @SWG\Property(property="apellidoPat", type="string"),
 *               @SWG\Property(property="apellidoMat", type="string"),
 *               @SWG\Property(property="direccion", type="string"),
 *               @SWG\Property(property="fono", type="string"),
 *               @SWG\Property(property="sistema_salud", type="string"),
 *               @SWG\Property(property="email", type="string"),
 *
 * 		)
 * ),
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function edicionClientes($id,$rut,$email,$fono,$nombre,$apellidoPat,$apellidoMat,$direccion,$sistema_salud)
{
	editarCliente($id,$rut,$email,$fono,$nombre,$apellidoPat,$apellidoMat,$direccion,$sistema_salud);
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res);
	$json = json_encode($data);
	
	return $json;
}

/**
 * @SWG\Post(
 *		 path="/SonrisaFeliz/swagger/crearAtencion.php",
 *		 tags={"Endpoint"},
 *     summary="Creación de Atenciones",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     description="",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="object",
 *               @SWG\Property(property="idCliente", type="string"),
 *               @SWG\Property(property="idPres", type="string"),
 *               @SWG\Property(property="tipo_atencion", type="string"),
 *               @SWG\Property(property="monto", type="string"),
 *               @SWG\Property(property="fechahora", type="string"),
 *               @SWG\Property(property="presupuesto", type="string"),
 *               @SWG\Property(property="observacion", type="string"),
 *
 * 		)
 * ),
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function creacionAtenciones($idCliente,$idPres,$tipo_atencion,$monto,$fechahora,$presupuesto,$observacion)
{
	ingresoAtencion($idCliente,$idPres,$tipo_atencion,$monto,$fechahora,$presupuesto,$observacion);
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res);
	$json = json_encode($data);
	
	return $json;
}

/**
 * @SWG\Get(
 *		 path="/SonrisaFeliz/swagger/reporteTransaccion.php?fechaInicio={fechaInicio}&fechaFin={fechaFin}",
 *		 tags={"Endpoint"},
 *     summary="Consulta datos de un cliente",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * @SWG\Parameter(
 *     name="fechaInicio",
 *     in="path",
 *		 type="string",
 *     description="Formato Fecha: YYYY-MM-DD.",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="integer",
 *            @SWG\Property(property="fechaInicio", type="string"),
 *     )
 * ),
 
 * @SWG\Parameter(
 *     name="fechaFin",
 *     in="path",
 *		 type="string",
 *     description="Formato Fecha: YYYY-MM-DD.",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="integer",
 *            @SWG\Property(property="fechaFin", type="string"),
 *     )
 * ),
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function reporteTransaccion($fechaIni,$fechaFin)
{
	$data = informeTransaccion($fechaIni,$fechaFin);
	while($registro = mysqli_fetch_assoc($data))
	{
		$datos[] = $registro;
	}
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res, "Datos" => $datos);
	$json = json_encode($data);
	
	return $json;
}

/**
 * @SWG\Get(
 *		 path="/SonrisaFeliz/swagger/reporteContable.php?fechaInicio={fechaInicio}&fechaFin={fechaFin}",
 *		 tags={"Endpoint"},
 *     summary="Consulta datos de un cliente",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * @SWG\Parameter(
 *     name="fechaInicio",
 *     in="path",
 *		 type="string",
 *     description="Formato Fecha: YYYY-MM-DD.",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="integer",
 *            @SWG\Property(property="fechaInicio", type="string"),
 *     )
 * ),
 
 * @SWG\Parameter(
 *     name="fechaFin",
 *     in="path",
 *		 type="string",
 *     description="Formato Fecha: YYYY-MM-DD.",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="integer",
 *            @SWG\Property(property="fechaFin", type="string"),
 *     )
 * ),
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function reporteContable($fechaIni,$fechaFin)
{
	$data = informeContable($fechaIni,$fechaFin);
	while($registro = mysqli_fetch_assoc($data))
	{
		$datos[] = $registro;
	}
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res, "Datos" => $datos);
	$json = json_encode($data);
	
	return $json;
}
?>