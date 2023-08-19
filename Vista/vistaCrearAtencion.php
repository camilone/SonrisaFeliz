<?php
$idUsuario 		 = $_SESSION['id'];
$rutUsuario 	 = $_SESSION['rut'];
$nombreUsuario   = $_SESSION['nombre'];
$PerfilUsuario   = $_SESSION['tipo_user'];

$fecha = date("Y-m-d");

if($idUsuario == "" || $PerfilUsuario == "")
{
	header("Location: logout.php");
}
?>
<center>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<div id="tablaListadoFormulario" style="height:31%;">
		<div id="divInicial" class="fondo-gris-bandeja-autoriza" style="height: 38%;">
		    	<center>
		    		<form id="formBloqueo" name="formBloqueo" method="POST" action="../Controlador/ControladorIngresoAtenciones.php" onsubmit="return confirm('&iquest;EST&Aacute;S SEGURO QUE DESEA CREAR ESTA ATENCION?');">
		    		<div class="titulo">
		    		 <h1><img src="../Outfile/images/iconos/icono-Bandeja-Ejecutivo-Auto-Atencion.png" style="margin-right:15px" />{ ATENCIONES }</h1>
		    		</div><br>
						 <div class="panel panel-primary" id="evaluar">
			         <div class="panel-heading">
			            <h3 class="panel-title text-muted">INGRESO DE ATENCIONES</h3>
			         </div>
				       <div class="form-group" id="evaluar2"><br>
					   <label for="rutSocio">Rut</label>
				          <input type="text" id="rutBuscar" name="rutBuscar" class="form-control" style="width:40%"><br>
			          	<button type="button" id="buscarRut" class="btn btn-primary" style="margin-bottom:10px">Buscar</button>
			       	 </div>					 
			       	 <div  style="background-color: #F7F7F7;">
				       	 <div id="divDatosBenef" style="display:none">
					         <table id="tablaFormulario" class="table">
					          <thead>
					            <tr>
					              <th></th>
					              <th></th>
					              <th></th>
					              <th></th>
					              <th></th>
					            </tr>
					          </thead>
					          <tbody>
					            <tr>
					              <td></td>
					              <td style="max-width: 100px;">    
					              	<div class="form-group" id="evaluar1">
					                     <label for="rutSocio">Rut Cliente</label>
					                     <input type="text" id="rut" name="rut" class="form-control" required readonly="true">
										 <input type="hidden" id="idCliente" name="idCliente">
					                 </div>
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Fecha y Hora</label>
					                     <input type="date" id="fechahora" name="fechahora" max="<?php echo $fecha; ?>" class="form-control" required>
					                 </div>
					              	<div class="form-group" id="evaluar1">
					                     <label for="rutSocio">Prestador en Sesión</label>
										 <input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control" value="<?php echo $nombreUsuario; ?>" readonly="true">
										 <input type="hidden" id="idPres" name="idPres" value="<?php echo $idUsuario; ?>">
					                 </div>									 
					              </td>
					              <td style="max-width: 100px;">
					                <div>
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Nombre cliente</label>
					                     <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control" required readonly="true">
					                 </div>
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Monto</label>
					                     <input type="text" id="monto" name="monto" class="form-control" min="1" onkeypress="return checkNumeros(event);" required>
					                 </div>	
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Observaciones</label>
					                     <textarea rows="5" cols="25" id="observacion" name="observacion" class="form-control"></textarea>
					                 </div> 
					                 	 <br><br><br>
						                 <center>
						                 	<button type="submit" id="accion" name="accion" class="btn btn-primary" style="margin-bottom:10px" >Ingresar Atención</button>
						                 </center>
						              </div>
					              </td>
					              <td style="max-width: 100px;">
					               <div>
					              	 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Sistema de Salud</label>
					                     <input type="text" id="direccion" name="direccion" class="form-control" readonly="true">
					                 </div>
					                   <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Número de Presupuesto</label>
					                     <input type="text" id="presupuesto" name="presupuesto" class="form-control" required>
					                 </div>
					                   <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Tipo de Atención</label>
					                     <select required class="form-control js-example-basic-single" id="tipo_atencion" name="tipo_atencion" style="width:100%;height:34px;">
							             </select>
					                 </div>									 
					               </div>
					              </td>
					              <td></td>
					            </tr>
					          </tbody>
					         </table>
					       </div>
			       	 </div>
			       </div>
		       </form>
		      </div>   
		    </div>
		  </div>
<script>
$(document).ready(function()
{
	$('#rut').rut();
	$('#rutBuscar').rut();
	$(".js-example-basic-single").select2();
	$("#buscarRut").on("click", llenaDatos);
	llenaComboTA();
});

$("#accion").on("click", validar);

function llenaComboTA()
{
    $.ajax({
      dataType: "json",
      url:   '../Funciones/comboTipoAtencion.php',
      type:  'get',
      beforeSend: function(){
        //Lo que se hace antes de enviar el formulario       
        },
      success: function(respuesta){
        //lo que se si el destino devuelve algo
       	$('#tipo_atencion').html(respuesta.tipo_atencion);
       },
      error:  function(xhr,err){ 
        swal("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
      }
    });
}

function validar()
{
	rutBuscar = $("#rut").val();
	var es_valido = $.rut.validar(rutBuscar);

	if(es_valido == true){
		return true;
	}
	else
	{
		swal("Error!","Rut incorrecto.", "error");
		$("#rut").val("");
		return false;
	}
}

function check(evt) 
{
    var code = (evt.which) ? evt.which : evt.keyCode;

    //Tecla de retroceso para borrar, siempre la permite
    if (code == 8) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z]/;
    var tecla_final = String.fromCharCode(code);
    return patron.test(tecla_final);
}

function checkNumeros(evt) 
{
    var code = (evt.which) ? evt.which : evt.keyCode;

    //Tecla de retroceso para borrar, siempre la permite
    if (code == 8) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[0-9]/;
    var tecla_final = String.fromCharCode(code);
    return patron.test(tecla_final);
}

function llenaDatos()
{			  
  var rutBuscar = $("#rutBuscar").val();
  var largoRut = rutBuscar.length;
  	
  	if(rutBuscar == "") 
  	{
  		swal("Error!","Rut Incorrecto.", "error");
  	}
  	else
  	{
  		
		var rutBuscar = rutBuscar.toUpperCase();
  		
    $.ajax({
      dataType: "json",
      data: {"rut": rutBuscar},
      url:   '../Funciones/FuncionConsultaDatos.php',
      type:  'get',
      beforeSend: function(){
        //Lo que se hace antes de enviar el formulario       
        },
      success: function(respuesta){
        //lo que se si el destino devuelve algo
       $cod = respuesta.cod;
       if($cod == 0)
       {
		   swal("Error!","Cliente no Registrado.", "error");
		   $('#divDatosBenef').css("display","none");
		   $("#rutBuscar").val("");
       }
       else
       {
	       $('#rut').val(respuesta.rut);
	       $('#idCliente').val(respuesta.id);
	       $('#nombre_cliente').val(respuesta.nombre);
	       $('#direccion').val(respuesta.sistema_salud);
	       $('#divDatosBenef').css("display","block");
	       $('#divInicial').css("height","100%");
		   $("#tablaListadoFormulario").css("height","100%");
       }

       
       },
      error:  function(xhr,err){ 
        alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
      }
    });
  }
}
</script>