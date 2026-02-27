<?php
try{
require 'funciones.php';
$con = conectar();
$stmt = $con->prepare("DELETE FROM prestamos where dniUsuario = :dni and codigoLibro = :cod");
echo $_GET['dni'];
echo $_GET['id'];
if ($stmt->execute([":dni" => $_GET['dni'], ":cod" => $_GET['id']])) {
    header("Location: gestionaPrestamos.php");
} else {
    echo "<p>NO se ha podido borrar</p>";
}
}catch(Exception $e){
    echo $e->getMessage();
}
