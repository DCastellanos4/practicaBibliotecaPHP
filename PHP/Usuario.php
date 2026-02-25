<?php

spl_autoload_register(function ($clase) {
    $archivo = $clase . '.php';
    if (file_exists($archivo)) {
        require_once $archivo;
    }
});

class Usuario
{
    private $dni;
    private $nombre;
    private $prestamos = [];
    private $maxPrestamos;
    private $limitePrestamos;
    private $numPrestamos;

    public function __construct($DNI, $NOMBRE, $MAXPRESTAMOS, $LIMITEPRESTAMOS)
    {
        $this->dni = $DNI;
        $this->nombre = $NOMBRE;
        $this->prestamos = [];
        $this->maxPrestamos = $MAXPRESTAMOS;
        $this->limitePrestamos = $LIMITEPRESTAMOS;
        $this->numPrestamos = 0;
    }

    public function alcanzadoLimitePrestamos()
    {
        return $this->numPrestamos >= $this->maxPrestamos;
    }

    public function añadeDocumentoPrestado($doc)
    {
        // Validación de límites
        if ($this->alcanzadoLimitePrestamos()) {
            return;
        }

        // Validación de estado del documento
        // Nota: Si el documento ya tiene a este usuario asignado,
        // esta lógica podría bloquear la inserción si no se gestiona en Documento.
        if ($doc->estaPrestado()) {
            return;
        }

        $this->prestamos[] = $doc;
        $this->numPrestamos++;
    }

    public function eliminaDocumentoPrestado($cod)
    {
        $pos = $this->buscaDocumentoPrestado($cod);

        if ($pos != -1) {
            for ($x = $pos; $x < $this->numPrestamos - 1; $x++) {
                $this->prestamos[$x] = $this->prestamos[$x + 1];
            }

            unset($this->prestamos[$this->numPrestamos - 1]);
            $this->numPrestamos--;
        } else {
            echo "El documento con el código " . $cod . " no está prestado";
        }
    }

    public function buscaDocumentoPrestado($cod)
    {
        for ($x = 0; $x < $this->numPrestamos; $x++) {
            if ($this->prestamos[$x]->getCodigo() == $cod) {
                return $x;
            }
        }
        return -1;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function plazoPrestamoDocumento()
    {
        return $this->limitePrestamos;
    }

    public function __toString()
    {
        return "DNI: $this->dni<br>NOMBRE: $this->nombre <br>Prestamos: $this->numPrestamos";
    }

    public function getPrestamos()
    {
        return $this->prestamos;
    }

    public function setPrestamos($prestamos)
    {
        $this->prestamos = $prestamos;
        return $this;
    }
}
