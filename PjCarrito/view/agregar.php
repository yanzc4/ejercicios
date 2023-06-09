<?php
session_start();

require_once '../model/carrito.php';

$mensaje = "";
if( isset( $_REQUEST["btnGrabar"] ) ){
	$rec = array();
	$rec["producto"] = $_REQUEST["producto"];
	$rec["precio"] = $_REQUEST["precio"];
	$rec["cantidad"] = $_REQUEST["cantidad"];
	$rec["subtotal"] = $rec["precio"] * $rec["cantidad"];
	carritoAgregar($rec);
	$mensaje = "Proceso ok.";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <title></title>
    </head>
    <body>
        <h1>DEMO DE CARRITO</h1>
        <h3>Hola <?php echo($_SESSION["nombre"]); ?></h3>
        <table width="500">
          <tr class="menu01">
            <td width="150"><a href="agregar.php">Agregar Producto</a></td>
            <td width="123"><a href="ver.php">Ver Carrito</a></td>
            <td width="97"><a href="limpiar.php">Limpiar</a></td>
            <td width="102"><a href="salir.php">Salir</a></td>
          </tr>
        </table>
        <h3>Agregar Producto</h3>
        <form action="agregar.php" method="post">
			  <div class="divCampo">
				  <label for="producto" class="etiqueta">Nombre</label>
				  <input name="producto" type="text" class="campoEdicion" id="producto">
			  </div>
			  <div class="divCampo">
				  <label for="precio" class="etiqueta">Precio</label>
				  <input name="precio" type="text" class="campoEdicion" id="precio">
			  </div>
			  <div class="divCampo">
				  <label for="cantidad" class="etiqueta">Cantidad</label>
				  <input name="cantidad" type="text" class="campoEdicion" id="cantidad">
			  </div>
			  <div class="divBotones">
				  <input name="btnGrabar" type="submit" class="boton" value="Grabar">
			  </div>
		  </form>
		  <p><?php echo($mensaje); ?></p>
    </body>
</html>
