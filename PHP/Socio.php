<?php
spl_autoload_register(function ($clase) {
    $archivo = $clase . '.php';

    if (file_exists($archivo)) {
        require_once $archivo;
    }
});
class Socio extends Usuario {
    private static $maxPrestamosASocios=20;
    private static $limitePrestamosASocios=30;
    public function __construct($DNI, $NOMBRE, $MAXPRESTAMOS, $LIMITEPRESTAMOS)
    {
        return parent::__construct($DNI, $NOMBRE, self::$maxPrestamosASocios,self::$limitePrestamosASocios);
    }
    public function __toString()
    {
        return parent::__toString() + "-> SOCIO";
    }
}
