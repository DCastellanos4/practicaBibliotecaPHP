<?php
class Documento
{
    private $codigo;
    private $titulo;
    private $prestadoA;
    public function __construct($cod, $tit)
    {
        $this->codigo = $cod;
        $this->titulo = $tit;
        $this->prestadoA = null;
    }
    public function estaPrestado()
    {
        if ($this->prestadoA != null) {
            return true;
        } else {
            return false;
        }
    }
    public function prestaAUsuario($user)
    {
        if ($this->prestadoA != null) {
            echo "Libro prestado a: " . $this->prestadoA->getNombre();
        } else {
            $this->prestadoA = $user;
            $user->añadeDocumentoPrestado($this);
        }
    }
    public function plazoPrestamo(){
        if($this->prestadoA!=null){
            return $this->prestadoA->plazoPrestamoDocumento();
        }
        return -1;
    }
    public function devuelve()
    {
        $this->prestadoA->eliminaDocumentoPrestado($this->codigo);
        $this->prestadoA = null;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getPrestadoA()
    {
        return $this->prestadoA;
    }
    public function setPrestadoA($prestadoA)
    {
        $this->prestadoA = $prestadoA;

        return $this;
    }
    public function __toString()
    {
        if ($this->prestadoA != null) {
            return "CODIGO: $this->codigo <br>TITULO: $this->titulo <br>Prestado a: " . $this->prestadoA->getNombre();
        } else {
            return "CODIGO: $this->codigo <br>TITULO: $this->titulo <br>Prestado a: NULL";
        }
    }
}
