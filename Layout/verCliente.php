<?php
session_start();
$idUsuario 		 = $_SESSION['id'];
$rutUsuario 	 = $_SESSION['rut'];
$nombreUsuario   = $_SESSION['nombre'];
$PerfilUsuario   = $_SESSION['tipo_user'];

if($idUsuario == "" || $PerfilUsuario == "")
{
	header("Location: logout.php");
}
?>
<html>
  
  <head>
  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <script type="text/javascript" src="../Libreria/js/jquery.min.js"></script>
    <script type="text/javascript" src="../Libreria/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Libreria/js/jquery-latest.js"></script>
    <script type="text/javascript" src="../Libreria/js/assets/noBack.js"></script>
    <script type="text/javascript" src="../Libreria/js/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript" src="../Libreria/js/jquery.rut.chileno.js"></script>
    <script type="text/javascript" src="../Libreria/js/jquery.rut.chileno.min.js"></script>
    <script type="text/javascript" src="../Libreria/js/ValidadorRuts.js"></script>
	<script type="text/javascript" src="../Libreria/js/sweetalert.js"></script>
	
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="../Libreria/Css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../Libreria/Css/bootstrap.css" rel="stylesheet" type="text/css">
   	<link href="../Libreria/Css/estiloMenu.css" rel="stylesheet" type="text/css">
   	<link href="../Libreria/Css/animated.css" rel="stylesheet" type="text/css">
	
   	<div class="container-fluid" id="DivImagenHeader">
		<?php
			include("Headers/imagenHeader.php");
		?> 		   		
   	</div>
  </head> 
 
  
  	<div class="container-fluid" id="DivContainerPrincipal" >
  	<div class="">
		<div class="DivIncludeMenu">
		 	<?php
				include("Headers/menuHeader.php");
			?>
		</div>
		<div class="DivInfoIndex">
		 	<?php
				include("../Vista/vistaVerCliente.php");
			?>				  
		</div>
		
		</div> 	
	</div>
  </body>
</html>
<script>
$(document).ready(function()
{
	let params = new URLSearchParams(location.search);
	var ing = params.get('ing');
	
	if(ing == 1)
	{
		swal("Éxito!","EL CLIENTE FUE INGRESADO CORRECTAMENTE.", "success");
	}
	
});
</script>