<?php

function carritoAgregar( $item ) {
	$carrito = array();
	if( isset($_SESSION["carrito"]) ) {
		$carrito = $_SESSION["carrito"];
	}
	$carrito[] = $item;
	$_SESSION["carrito"] = $carrito;
}

//funcion para eliminar un item del carrito
function carritoEliminar( $item ) {
	$carrito = array();
	if( isset($_SESSION["carrito"]) ) {
		$carrito = $_SESSION["carrito"];
	}
	$indice = -1;
	for( $i=0; $i<count($carrito); $i++ ) {
		if( $carrito[$i]["producto"] == $item["producto"] ) {
			$indice = $i;
			break;
		}
	}
	if( $indice != -1 ) {
		unset($carrito[$indice]);
		$carrito = array_values($carrito);
	}
	$_SESSION["carrito"] = $carrito;
}

//funcion para elegir entre factura o boleta
function carritoTipo( $tipo ) {
	$_SESSION["tipo"] = $tipo;
}

//funcion para leer si es factura o boleta
function carritoLeerTipo() {
	$tipo = "";
	if( isset($_SESSION["tipo"]) ) {
		$tipo = $_SESSION["tipo"];
	}
	return $tipo;
}

//funcion para eliminar carritotipo
function carritoLimpiarTipo() {
	$_SESSION["tipo"] = "";
}


function carritoLeer() {
	$carrito = array();
	if( isset($_SESSION["carrito"]) ) {
		$carrito = $_SESSION["carrito"];
	}
	return $carrito;
}

function carritoLimpiar() {
	$_SESSION["carrito"] = array();
}

?>