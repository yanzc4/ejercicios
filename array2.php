<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="cant">
        <input type="submit" name="btn-cant" value="Enviar">
    </form>
    <hr>
    <?php
    if (isset($_POST['btn-cant'])) {
        $cant = $_POST['cant'];
        for ($i = 1; $i <= $cant; $i++) {
    ?>
            <form action="" method="post">
                Nota <?php echo $i ?>: <input type="text" name="nota<?php echo $i ?>" id="nota" placeholder="Nota <?php echo $i ?>">
                <br><br>
            <?php } ?>
            <input type="submit" name="btn" value="Enviar">
            </form>
        <?php
    }
        ?>
</body>

</html>
<?php
//guardamos los datos en un array asociativo traidos del form
if (isset($_POST['btn'])) {
    $canti = count($_POST) - 1;
    $w = 1;

    while ($w <= $canti) {
        $notas[$w] = $_POST['nota' . $w];
        $w++;
    }


    for ($i = 1; $i <= $canti; $i++) {
        echo "Nota " . $i . ": " . $notas[$i] . "<br>";
    }

    //promedio de un arreglo
    $suma = array_sum($notas);
    $promedio = $suma / $canti;
    echo "Promedio: " . round($promedio, 2). "<br>";

    // echo "Nombre: " . $notas[2]['nombre'] . "<br>Nota: " . $notas[1]['nota'] . "<br>";
}


?>