<?php
spl_autoload_register(function ($clase) {
    $archivo = $clase . '.php';
    if (file_exists($archivo)) {
        require_once $archivo;
    }
});
$u = new Usuario("1234", "david", 13, 15);

$d = new Documento(1, "PRUEBA");

$u->añadeDocumentoPrestado($d);
echo $u->__toString();
echo "<br><br>";
$d->prestaAUsuario($u);
echo $d->__toString();
echo "<br><br>";
$u->eliminaDocumentoPrestado(1);
echo $u->__toString();
// echo $u;
