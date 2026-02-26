<?php
spl_autoload_register(function ($clase) {
    $archivo = $clase . '.php';
    if (file_exists($archivo)) {
        require_once $archivo;
    }
});
class UsuarioOcasional extends Usuario{
    private static $maxPrestamosAUsuarios=2;
    private static $limitePrestamosAUsuarios=15;
    public function __construct($DNI, $NOMBRE)
    {
        return parent::__construct($DNI, $NOMBRE, self::$maxPrestamosAUsuarios, self::$limitePrestamosAUsuarios);
    }
    public function __toString()
    {
        return parent::__toString() . " -> USUARIO OCASIONAL";
    }
}
