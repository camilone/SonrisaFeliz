<?php
$idUsuario 		 = $_SESSION['id'];
$rutUsuario 	 = $_SESSION['rut'];
$nombreUsuario   = $_SESSION['nombre'];
$PerfilUsuario   = $_SESSION['tipo_user'];

if($idUsuario == "" || $PerfilUsuario == "")
{
	header("Location: logout.php");
}
?>
<center>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<div id="tablaListadoFormulario" style="height: 31%;">
		<div id="divInicial" class="fondo-gris-bandeja-autoriza" style="height: 38%;">
		    	<center>
		    		<form id="formBloqueo" name="formBloqueo" method="POST" action="../Controlador/ControladorIngresoClientes.php">
		    		<div class="titulo">
		    		 <h1><img src="../Outfile/images/iconos/icono-Bandeja-Ejecutivo-Auto-Atencion.png" style="margin-right:15px" />{ CLIENTES }</h1>
		    		</div><br>
						 <div class="panel panel-primary" id="evaluar">
			         <div class="panel-heading">
			            <h3 class="panel-title text-muted">CONSULTA DE CLIENTES</h3>
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
					                     <input type="text" id="rut" name="rut" class="form-control" readonly>
					                 </div>
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Correo Electrónico</label>
					                     <input type="text" id="email" name="email" class="form-control" readonly>
					                 </div>     
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Teléfono de Contacto</label>
					                     <input type="text" id="fono" name="fono" class="form-control" value="" onkeypress="return checkNumeros(event);" readonly>
					                 </div>  									 
					              </td>
					              <td style="max-width: 100px;">
					                <div>
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Nombre cliente</label>
					                     <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control" onkeypress="return check(event);" readonly>
					                 </div>
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Primer Apellido</label>
					                     <input type="text" id="apellidoPat" name="apellidoPat" class="form-control" onkeypress="return check(event);" readonly>
					                 </div>	
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Segundo Apellido</label>
					                     <input type="text" id="apellidoMat" name="apellidoMat" class="form-control" onkeypress="return check(event);" readonly>
					                 </div> 
						              </div>
					              </td>
					              <td style="max-width: 100px;">
					               <div>
					              	 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Dirección</label>
					                     <input type="text" id="direccion" name="direccion" class="form-control" readonly>
					                 </div>
					                   <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Sistema Salud</label>
										 <input type="text" id="sistema_salud" name="sistema_salud" class="form-control" readonly>
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
});

function llenaComboSS()
{
    $.ajax({
      dataType: "json",
      url:   '../Funciones/comboSistemaSalud.php',
      type:  'get',
      beforeSend: function(){
        //Lo que se hace antes de enviar el formulario       
        },
      success: function(respuesta){
        //lo que se si el destino devuelve algo
       	$('#sistema_salud').html(respuesta.sistema_salud);
       },
      error:  function(xhr,err){ 
        swal("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
      }
    });
}

function validaRut()
{
	rut = $("#rut").val();
	
	$.ajax({
      dataType: "json",
      data: {"rut": rut},
      url:   '../Funciones/FuncionValidaRut.php',
      type:  'get',
      beforeSend: function(){
        //Lo que se hace antes de enviar el formulario
        },
      success: function(respuesta){
        //lo que se si el destino devuelve algo
      if(respuesta.Rut != 0)
      {
		swal("Error!","Este Cliente ya existe.", "error");
      	$("#rut").val("");
      }
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

function validaEmail()
{                
	// Get our input reference.
	var emailField = document.getElementById('email');
	
	// Define our regular expression.
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

	// Using test we can check if the text match the pattern
	if( validEmail.test(emailField.value)){
		//swal('Email is valid, continue with form submission');0
		return true;
	}else{
		swal("Error!","Email no válido.", "error");
		$("#email").val("");
		return false;
	}
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

function Telefono() 
{
	var tel = $("#fono").val();
	if(tel == "")
	{
		$("#fono").val("+569");
	}
}

function validarFono() 
{
	var tel = $("#fono").val().length;
	if(tel != 12)
	{
		swal("Error!","Teléfono no válido.", "error");
		$("#fono").val("+569");
	}
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
      url:   '../Funciones/FuncionConsultaDatosCliente.php',
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
		   $('#apellidoPat').val(respuesta.pr_apellido);
		   $('#apellidoMat').val(respuesta.se_apellido);
		   $('#fono').val(respuesta.telefono);
		   $('#direccion').val(respuesta.direccion);
		   $('#email').val(respuesta.email);
	       $('#sistema_salud').val(respuesta.sistema_salud);
		   
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