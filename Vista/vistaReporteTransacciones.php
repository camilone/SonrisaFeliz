<?php
?>
<center>
<div class="titulo"> 
  <h1>
  		<img src="../Outfile/images/iconos/icono-Bandeja-Ejecutivo-Auto-Atencion.png" style="margin-right:15px" />{ REPORTE DE TRANSACCIONES }
  </h1> 
</div>
<div class="fondo-gris-bandeja-autoriza">  
	<br>	
	<div style="width:96%">		
		<div class="panel panel-primary">
		    <div class="panel-heading">
		      <h4 class="panel-title text-muted">GENERACIÓN</h4>
		    </div>
		    <div class="panel-body" id="DivTablasReembolsos">
		    	<label for="nombreEmpresa">Fecha Inicio: </label>
		    	<div class="form-group" style="margin-right:20px;width:10%;display:inline-flex">
				        <input type="date" id="fecha1" name="fecha1" class="form-control"/>
				  </div>
				  <label for="nombreEmpresa">Fecha T&eacute;rmino: </label>
				  <div class="form-group" style="margin-right:20px;width:10%;display:inline-flex">
				        <input type="date" id="fecha2" name="fecha2" class="form-control"/>
				  </div>
				  <div class="form-group" style="margin-right:20px">
			          <!-- <button type="submit" id="btn_enviar3" class="btn btn-primary">Listar</button> -->
			    </div>               	
		      <table id="movimientosTransfer" class="table table-hover" style="font-size: smaller">    	
						<caption id="captionTableReembolsos"></caption>
								<thead class="tituloTablas">
								  <tr>
								  </tr>
								</thead>
								<tbody id="listar" style="font-size: 14px;">
								</tbody>
					</table>		   
						<button class="btn" id="descarga"><a target="_blank">Descargar REPORTE</button></a>
		    </div>
		</div>
	</div>
</div>
</center>


<script>
$(document).ready(function()
{
	$("#descarga").on("click", descargarReporte);
});

function descargarReporte()
{
	$fecha1 = $("#fecha1").val();
	$fecha2 = $("#fecha2").val();
	
	if($fecha2 < $fecha1)
	{
		alert("Primera fecha no puede ser mayor a la segunda fecha ingresada.");
	}
	else if($fecha1 == "" && $fecha2 == "")
	{
		alert("Debe ingresar ambas fechas.");
	}
	else if($fecha1 == "" && $fecha2 != "")
	{
		alert("Debe ingresar ambas fechas.");
	}
	else if($fecha1 != "" && $fecha2 == "")
	{
		alert("Debe ingresar ambas fechas.");
	}
	else
	{
		window.location.href = "../Funciones/ReporteTransacciones.php?fechaInicio="+$fecha1+"&fechaFin="+$fecha2+"";
	}
}

function mostrarDescarga()
{
	$('#descarga').attr("disabled", false);
}
	
</script> 