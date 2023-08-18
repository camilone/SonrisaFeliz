<div class="container" style="height:50%">

        <form class="form-signin" form name="formLogin" id="formLogin" method="POST" action="../Controlador/ControladorLogin.php">
          <center>
		  
            <div style="width:50%;margin-top: 6%">			
            <h2 class="form-signin-heading">PORTAL SONRISA FELIZ</h2><br>
			
            <label for="nombreLogin" class="sr-only">Nombre Usuario</label>
            <input type="text" id="nombreLogin" name="nombreLogin" class="form-control" placeholder="Usuario" required autofocus>
			
            <label for="claveLogin" class="sr-only">Rut</label>
            <input type="password" id="claveLogin" name="claveLogin" class="form-control" placeholder="Contrase&ntilde;a" required>
          
            <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
			
            </div>
          </center>

        </form>  
   </div>
   
<script>
//aplicando las funciones
$(document).ready(function()
{
	//asignamos el valor id del campo que queremos que se mayúscula
	mayuscula("input#nombreLogin");
});

function mayuscula(campo)
{
	$(campo).keyup(function()
	{
	  $(this).val($(this).val().toUpperCase());
	});
}
</script>