<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="text-align: center;">
    <h1>Portal de prestamos de documentos a usuarios</h1>
    <form action="darPrestamos.php" method="post">
        Selecciona usuario:
        <select name="user">
            <?php
            require 'funciones.php';
            $con = conectar();
            $stmt = $con->prepare("SELECT dni,nombre from usuarios");
            $stmt->execute();
            while ($resultados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$resultados['dni']}'>{$resultados['nombre']}</option>";
            }
            ?>
        </select>
        <br>
        Selecciona documento:
        <select name="doc">
            <?php
            $con = conectar();
            $stmt = $con->prepare("SELECT codigo,titulo from documentos");
            $stmt->execute();
            while ($resultados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$resultados['codigo']}'>{$resultados['titulo']}</option>";
            }
            ?>
        </select>
        <br>
        Fecha Devolución:
        <input type="date" name="fecha">
        <br>
        <input type="submit" value="Prestar" name="enviar">
    </form>
    <?php
    spl_autoload_register(function ($clase) {
        $archivo = $clase . '.php';
        if (file_exists($archivo)) {
            require_once $archivo;
        }
    });
    $fecha = new DateTime();
    $strFechaInicial = $fecha->format('Y-m-d');
    // $strFechaDevol = $_POST['fecha']->format('Y-m-d');
    if (isset($_POST['enviar'])) {
        // echo $strFechaDevol;
        if (!empty($_POST['user']) && !empty($_POST['doc'])) {
            $b = new Biblioteca();
            $b->handDocument($_POST['doc'], $_POST['user'], $strFechaInicial, $_POST['fecha']);
        }
    }
    ?>
    <a href="GestionaBiblioteca.php">[Volver]</a>

</body>

</html>
