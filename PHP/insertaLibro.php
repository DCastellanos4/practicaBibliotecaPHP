<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="text-align: center;">
    <h1>Insercion de documentos en el sistema</h1>
    <form method="get" action="insertaLibro.php">
        <select name="tipoDoc">
            <option>Libro</option>
            <option>Revista</option>
        </select>
        <input type="submit" name="enviar" value="Seleccionar tipo de documento">
    </form>
    <br><br>
    <form method="POST" action="insertaLibro.php">
        CODIGO: <input type="text" name="codigo">
        <br><br>
        TITULO: <input type="text" name="titulo">
        <br><br>
        <?php
        if (isset($_GET['tipoDoc'])) {
            if ($_GET['tipoDoc'] == "Libro") {
                echo 'Año de publicación: <input type="text" name="anio">';
                echo "<br><br>";
            }
        }
        ?>
        <input type="submit" name="enviar" value="Enviar datos">
    </form>
    <?php
    spl_autoload_register(function ($clase) {
        $archivo = $clase . '.php';
        if (file_exists($archivo)) {
            require_once $archivo;
        }
    });
    $b=new Biblioteca();
    echo $_POST['codigo'];
    echo $_POST['titulo'];
    echo $_POST['anio'];
    ?>
    <br>
    <a href="GestionaBiblioteca.php">[Volver]</a>
</body>

</html>
