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

    /**
     * Representación en cadena del objeto
     */
    public function __toString()
    {
        // Concatenamos el toString del padre con el dato local
        return parent::__toString() . " Año publicación: " . $this->anioPublicacion;
    }
}
