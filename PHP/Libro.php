<?php
spl_autoload_register(function ($clase) {
    $archivo = $clase . '.php';

    if (file_exists($archivo)) {
        require_once $archivo;
    }
});

class Libro extends Documento
{
    private $anioPublicacion;
    public function __construct($cod = null, $til = null, $anio)
    {
        parent::__construct($cod, $til);

        $this->anioPublicacion = $anio;
    }

    public function getAñoPublicacion()
    {
        return $this->anioPublicacion;
    }

    public function setAñoPublicacion($anioPublicacion)
    {
        $this->anioPublicacion = $anioPublicacion;
    }

    public function __toString()
    {
        return parent::__toString() . "<br> Año de publicación: " . $this->anioPublicacion;
    }
    public function getCodigo()
    {
        return parent::getCodigo();
    }
}
