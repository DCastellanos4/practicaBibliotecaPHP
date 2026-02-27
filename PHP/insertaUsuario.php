<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="text-align: center;">
    <h1>Portal de insercion de usuarios</h1>
    <form method="POST" action="insertaUsuario.php">
        DNI: <input type="text" name="dni">
        <br>
        NOMBRE: <input type="text" name="nombre">
        <br>
        Es socio? <input type="checkbox" name="socio">
        <br>
        <input type="submit" value="enviar" name="enviar">
    </form>
    <br>
    <?php
    spl_autoload_register(function ($clase) {
        $archivo = $clase . '.php';
        if (file_exists($archivo)) {
            require_once $archivo;
        }
    });
    $numPrestamos = 0;
    if (isset($_POST['socio'])) {
        $tipo = "Socio";
        $maxPrestamos = 250;
    } else {
        $tipo = "Usuario Ocasional";
        $maxPrestamos = 2;
    }
    if (isset($_POST['enviar'])) {
        $b = new Biblioteca();
        if (!empty($_POST['dni']) && !empty($_POST['nombre'])) {
            $b->addUser($_POST['dni'], $_POST['nombre'], $tipo, $numPrestamos, $maxPrestamos);
        } else if (empty($_POST['dni'])) {
            echo '<p style="color:red">Introduce un dni valido</p>';
        } else if (empty($_POST['nombre'])) {
            echo '<p style="color:red">Introduce un nombre valido</p>';
        }
    }
    ?>
    <a href="GestionaBiblioteca.php">[Volver]</a>
</body>

</html>
