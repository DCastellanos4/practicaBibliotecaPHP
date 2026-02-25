<?php
spl_autoload_register(function ($clase) {
    $archivo = $clase . '.php';

    if (file_exists($archivo)) {
        require_once $archivo;
    }
});
class Revista extends Documento{
    public function __construct($cod, $tit)
    {
        return parent::__construct($cod, $tit);
    }
    public function plazoPrestamo()
    {
        return parent::plazoPrestamo()/3;
    }
}
