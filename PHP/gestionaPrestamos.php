<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="text-align: center;">
    <?php
    spl_autoload_register(function ($clase) {
        $archivo = $clase . '.php';
        if (file_exists($archivo)) {
            require_once $archivo;
        }
    });
    $b = new Biblioteca();
    $b->showHandedReport();
    ?>
    <a href="GestionaBiblioteca.php">[Volver]</a>
</body>

</html>
