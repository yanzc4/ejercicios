<?php
session_start();

require_once '../model/carrito.php';

carritoLimpiar();
carritoLimpiarTipo();

header("location: ver.php");

?>
