<?php
session_start();

$mensaje = "";
if( isset( $_REQUEST["btnAceptar"] ) ) {
	$nombre = $_REQUEST["nombre"];
	if( $nombre =="ADMIN") {
		$_SESSION["nombre"] = $nombre;
		header("location: main.php");
		return;
	} else {
		$mensaje = "CREDENCIALES INCORRECTAS";
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
		<title></title>
	</head>
	<body >
		<h1>DEMO DE CARRITO</h1>
		<h2>Identificación</h2>
		<form name="form1" method="post" action="logueo.php">
			<div class="divCampo">
				<label for="nombre" class="etiqueta">Nombre</label>
				<input name="nombre" type="text" class="campoEdicion" id="nombre">
			</div>
			<div class="divBotones">
				<input name="btnAceptar" type="submit" class="boton" id="btnAceptar" value="Aceptar">
			</div>
		</form>
		<p class="mensajeError"><?php echo($mensaje); ?></p>
	</body>
</html>