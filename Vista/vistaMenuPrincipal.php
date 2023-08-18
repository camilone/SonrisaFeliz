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
<div class="titulo">

  <h1><img src="../Outfile/images/iconos/icono-Bienvenido.png" style="margin-right:15px;" />{ PORTAL SONRISA FELIZ }</h1>
  
</div>

<img src="../Outfile/images/fondo_coop.png" />

</center>