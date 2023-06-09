<?php
session_start();
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
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </body>
</html>
