<?php
session_start();

require_once '../model/carrito.php';

$carrito = carritoLeer();

$mensaje = "";
if (isset($_REQUEST["btnEliminar"])) {
    $rec = array();
    $rec["producto"] = $_REQUEST["id"];
    carritoEliminar($rec);
    $mensaje = "Proceso ok.";
    $carrito = carritoLeer();
}
if (isset($_REQUEST["btnTipo"])) {
    $manda = $_REQUEST["tipo"];
    carritoTipo($manda);
}
$tipo = carritoLeerTipo();

$subtotal = 0;
$desc = 0.00;

//poner zona horaria peru
date_default_timezone_set('America/Lima');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <title>Carrito</title>
    <style>
        .row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: 1fr;
            grid-column-gap: 6px;
            grid-row-gap: 0px;
        }

        .mayus {
            text-transform: uppercase;
        }

        .btn-delete {
            background: red;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 0.5rem;
            width: 100%;
        }

        .btn-edit {
            background: rgb(255, 230, 5);
            color: black;
            border: none;
            border-radius: 5px;
            padding: 0.5rem;
        }

        .btn-edit:hover {
            scale: 0.9;
        }

        .btn-delete:hover {
            scale: 0.9;
        }

        .modal {
            text-align: center;
            background-color: #18191a;
            width: 100%;
        }

        .card {
            width: 320px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
            padding-top: 15px;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 15px;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: end;
        }

        .mt {
            margin-top: 10px;
        }

        .mb {
            margin-bottom: 10px;
        }

        .pb {
            padding-bottom: 10px;
        }

        .pt {
            padding-top: 10px;
        }

        .pl {
            padding-left: 30px;
        }

        .pr {
            padding-right: 30px;
        }

        .borde-t {
            border-top-style: dashed;
        }

        .borde-b {
            border-bottom-style: dashed;
        }

        .borde-l {
            border-left-style: dashed;
        }

        .borde-r {
            border-right-style: dashed;
        }

        .f-16 {
            font-size: 16px;
            font-weight: bold;
        }

        .columna {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: 1fr;
            grid-column-gap: 10px;
            grid-row-gap: 0px;
        }
    </style>
</head>

<body>
    <h1>DEMO DE CARRITO</h1>
    <h3>Hola <?php echo ($_SESSION["nombre"]); ?></h3>
    <table width="500">
        <tr class="menu01">
            <td width="150"><a href="agregar.php">Agregar Producto</a></td>
            <td width="123"><a href="ver.php">Ver Carrito</a></td>
            <td width="97"><a href="limpiar.php">Limpiar</a></td>
            <td width="102"><a href="salir.php">Salir</a></td>
        </tr>
    </table>
    <h3>Ver Carrito</h3>

    <?php if ($carrito) { ?>
        <table width="400" border="1">
            <tr class="tablaTitulo">
                <td>Producto</td>
                <td>Precio</td>
                <td>Cant.</td>
                <td>Subtotal</td>
                <td>Opciones</td>
            </tr>
            <?php foreach ($carrito as $rec) { ?>
                <tr class="TablaDato">
                    <form action="ver.php" method="post">
                        <td><?php echo ($rec["producto"]); ?></td>
                        <td><?php echo ($rec["precio"]); ?></td>
                        <td><?php echo ($rec["cantidad"]); ?></td>
                        <td><?php echo ($rec["subtotal"]); ?></td>
                        <input type="hidden" name="id" value="<?php echo ($rec["producto"]) ?>">
                        <td>
                            <div class="row">
                                <button class="btn-delete" name="btnEliminar"><i class='bx bx-trash'></i></button>
                    </form>
                    <button class="btn-edit"><i class='bx bx-edit-alt'></i></button>
                    </div>
                    </td>
                </tr>
            <?php
                $subtotal = $subtotal + $rec["subtotal"];
            }
            ?>
        </table>
    <?php } else { ?>
        <p>El carrito está vacío</p>
    <?php } ?>

    <!-- formulario para elegir boleta o factura -->
    <div class="pt">
        <form action="ver.php" method="post">
            <input type="radio" name="tipo" value="boleta" checked>Boleta
            <input type="radio" name="tipo" value="factura">Factura
            <input type="submit" class="btn-edit pl pr" name="btnTipo" value="Elegir">
        </form>
    </div>

    <!-- Boleta o factura -->
    <?php
    if ($carrito && $tipo) {
    ?>
        <div class="card">
            <div class="text-center">
                <h2 class="mayus"><?php echo $tipo ?></h2>
            </div>
            <div class="borde-t borde-b pb text-center">
                <h3>TIENDA DEMO CARRITO</h3>
                <span>R.U.C: 11145623412</span><br>
                <span>Jr. Marañon 567 Lima</span>
            </div>
            <div class="borde-b pb pt">
                <span>Fecha de Emisión: <?php echo (date("d/m/Y")); ?></span><br>
                <span>Orden Nro: 001</span>
            </div>
            <div class="columna pt borde-b pb">
                <div>PRODUCTO</div>
                <div>CANTIDAD</div>
                <div>PRECIO</div>
            </div>
            <div class="borde-b">
                <?php foreach ($carrito as $rec) { ?>
                    <div class="columna pt pb">
                        <div><?php echo ($rec["producto"]); ?></div>
                        <div><?php echo ($rec["cantidad"]); ?></div>
                        <div><?php echo ($rec["precio"]); ?></div>
                    </div>
                <?php } ?>
            </div>
            <div class="borde-b pb pt text-end f-16 pr">
                <?php
                if ($tipo == "boleta") {
                    $total = $subtotal - $desc;
                ?>
                    <span>SUBTOTAL: S/. <?php echo round($subtotal, 2); ?></span><br>
                    <span>DESCUENTO: S/. <?php echo round($desc, 2); ?></span><br>
                    <span>TOTAL: S/. <?php echo round($total, 2); ?></span><br>
                <?php
                } elseif ($tipo == "factura") {
                    $igv = $subtotal * 0.18;
                    $total = $subtotal - $desc + $igv;
                ?>
                    <span>SUBTOTAL: S/. <?php echo round($subtotal, 2); ?></span><br>
                    <span>DESCUENTO: S/. <?php echo round($desc, 2); ?></span><br>
                    <span>IGV: S/. <?php echo round($igv, 2); ?></span><br>
                    <span>TOTAL: S/. <?php echo round($total, 2); ?></span><br>
                <?php
                }
                ?>

            </div>
            <div class="text-center pt pb">
                <svg id="barras"></svg>
            </div>
        </div>
    <?php
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <script>
        JsBarcode("#barras", "Orden 001", {
            lineColor: "#000080"
        });
    </script>
</body>

</html>