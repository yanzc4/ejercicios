<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>frutas</title>
</head>
<body>
    <h1>Frutas</h1>
    <?php
    if(!$_POST) {
        ?>
        <form action="" method="POST">
            <label for="num">¿Cuántas frutas deseas indicar?</label>
            <input type="text" name="num">
            <input type="submit" name="submit" value="Enviar">
        </form>
    <?php
    } elseif(isset($_POST['num'])) {
    ?>
        <form action="" method="POST">
        <?php
            $num = $_POST['num'];
            for($i = 1; $i <= $num; $i++) {
                ?>
                <input type="text" name="fruta[]" placeholder="fruta<?php echo $i ?>" value="">
                <br><br>
                <?php
            }
        ?>
            <input type="submit" value="Enviar">
        </form>
    <?php
    } else {
        foreach($_POST['fruta'] as $fruta) {
            echo "<p>Fruta recibida: $fruta</p>";
        }
        echo "<a href=''>Volver</a>";
    }
    ?>
    </body>
    </html>