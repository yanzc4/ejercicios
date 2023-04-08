<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body {
        background-color: #000;
        color: #fff;
    }

    .redondear {
        border-radius: 10px;
    }
</style>

<body>

    <h1 class="text-center mt-3">Practica 1</h1>
    <div class="container mt-5">

        <div class="row">
            <div class="col-5 bg-primary p-4 redondear">
                <form action="#" method="POST">
                    <select name="tipo" id="">
                        <option value="piramide">Piramide</option>
                        <option value="piramideInvertida">Piramide Invertida</option>
                        <option value="rombo">Rombo</option>
                        <option value="piramideDerecha">Piramide Derecha</option>
                        <option value="cuadrado">Cuadrado</option>
                    </select>
                    <input type="text" name="numero">
                    <button>Crear</button>
                </form>
            </div>

            <div class="col-1"></div>
            <div class="col-5 bg-success fw-bold p-3 redondear">
                <?php

                function piramide($filas)
                {
                    echo "<center>";
                    $cadena = null;
                    for ($i = 1; $i <= $filas; $i++) {
                        for ($h = $i; $h <= $i; $h++) {
                            $cadena .= "* ";
                        }
                        echo $cadena . "<br />";
                    }
                    echo "</center>";
                }

                function piramideInvertida($n)
                {
                    echo "<center>";
                    for ($i = $n; $i >= 1; $i--) {
                        for ($j = 1; $j <= $i; $j++) {
                            echo "* ";
                        }
                        echo "<br />";
                    }
                    echo "</center>";
                }

                function rombo($filas)
                {
                    echo "<center>";
                    $cadena = null;
                    for ($i = 1; $i <= $filas; $i++) {
                        for ($h = $i; $h <= $i; $h++) {
                            $cadena .= "* ";
                        }
                        echo $cadena . "<br />";
                    }
                    for ($i = $filas; $i >= 1; $i--) {
                        for ($j = 1; $j <= $i; $j++) {
                            echo "* ";
                        }
                        echo "<br />";
                    }
                    echo "</center>";
                }

                function piramideDerecha($filas)
                {
                    for ($n = 1; $n <= $filas; $n++) {
                        echo str_pad('', $n, '*') . '<br />';
                    }

                    //bucle para el triángulo invertido 
                    for ($n = $filas - 1; $n >= 1; $n--) {
                        echo str_pad('', $n, '*') . '<br />';
                    }
                }

                function cuadrado($filas)
                {
                    for ($fila = 1; $fila <= $filas; $fila++) {
                        for ($columna = 1; $columna <= $filas; $columna++) {
                            echo "* ";
                        }
                        echo "<br>"; //Salto de línea para pasar a la siguiente FILA
                    }
                }



                if (isset($_POST['numero'])) {
                    $numero = $_POST['numero'];
                    $tipo = $_POST['tipo'];
                    $tipo($numero);
                } else {
                    echo "Esperando numero";
                }

                ?>
            </div>
        </div>

    </div>
</body>

</html>