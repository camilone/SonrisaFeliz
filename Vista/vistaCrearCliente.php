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
	<div id="tablaListadoFormulario" style="height: 56%;">
		<div id="divInicial" class="fondo-gris-bandeja-autoriza" style="height: 38%;">
		    	<center>
		    		<form id="formBloqueo" name="formBloqueo" method="POST" action="../Controlador/ControladorIngresoClientes.php" onsubmit="return confirm('&iquest;EST&Aacute;S SEGURO QUE DESEA CREAR ESTE CLIENTE?');">
		    		<div class="titulo">
		    		 <h1><img src="../Outfile/images/iconos/icono-Bandeja-Ejecutivo-Auto-Atencion.png" style="margin-right:15px" />{ CLIENTES }</h1>
		    		</div><br>
						 <div class="panel panel-primary" id="evaluar">
			         <div class="panel-heading">
			            <h3 class="panel-title text-muted">CREACIÓN DE CLIENTES</h3>
			         </div>
			       	 <div  style="background-color: #F7F7F7;">
				       	 <div id="divDatosBenef">
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
					                     <input type="text" id="rut" name="rut" class="form-control" required>
					                 </div>
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Correo Electrónico</label>
					                     <input type="text" id="email" name="email" class="form-control" required>
					                 </div>     
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Teléfono de Contacto</label>
					                     <input type="text" id="fono" name="fono" class="form-control" value="+569" onkeypress="return checkNumeros(event);" required>
					                 </div>  									 
					              </td>
					              <td style="max-width: 100px;">
					                <div>
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Nombre cliente</label>
					                     <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control" onkeypress="return check(event);" required>
					                 </div>
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Primer Apellido</label>
					                     <input type="text" id="apellidoPat" name="apellidoPat" class="form-control" onkeypress="return check(event);" required>
					                 </div>	
					                 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Segundo Apellido</label>
					                     <input type="text" id="apellidoMat" name="apellidoMat" class="form-control" onkeypress="return check(event);" required>
					                 </div> 
					                 	 <br><br><br>
						                 <center>
						                 	<button type="submit" id="accion" name="accion" class="btn btn-primary" style="margin-bottom:10px" >Crear Cliente</button>
						                 </center>
						              </div>
					              </td>
					              <td style="max-width: 100px;">
					               <div>
					              	 <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Dirección</label>
					                     <input type="text" id="direccion" name="direccion" class="form-control" >
					                 </div>
					                   <div class="form-group" id="evaluar2">
					                     <label for="direccionSocio">Sistema Salud</label>
					                     <select required class="form-control js-example-basic-single" id="sistema_salud" name="sistema_salud" style="width:100%;height:34px;">
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
	llenaComboSS();
	$(".js-example-basic-single").select2();
});

$("#rut").on("change", validaRut);
$("#accion").on("click", validar);
$("#accion").on("click", validarFono);
$("#email").on("change", validaEmail);
$("#fono").on("change", Telefono);

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
        alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
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
      	alert("Este Cliente ya existe.");
      	$("#rut").val("");
      }
       },
      error:  function(xhr,err){ 
        alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
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
		alert("Rut incorrecto");
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
		//alert('Email is valid, continue with form submission');0
		return true;
	}else{
		alert('Email no válido');
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
		alert('Teléfono no válido.');
		$("#fono").val("+569");
	}
}
</script>