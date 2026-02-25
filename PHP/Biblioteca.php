<?php
class Biblioteca
{
    private $usuarios;
    private $documentos;
    private $maxUsuarios = 50;
    private $numUsu;
    private $maxDocus = 200;
    private $numDocus;
    public function __construct()
    {
        $this->usuarios = [];
        $this->documentos = [];
        $this->numUsu = 0;
        $this->numDocus = 0;
    }
    public function addDocument($doc)
    {
        if ($doc != null) {
            $this->documentos = $doc;
            $this->numDocus++;
        }
    }
    public function addUser($user)
    {
        if ($user != null) {
            $this->usuarios = $user;
            $this->numUsu++;
        }
    }
    public function searchDocument($cod)
    {
        for ($x = 0; $x < $this->numDocus; $x++) {
            if ($this->documentos[$x]->getCodigo() == $cod) {
                return $this->documentos[$x];
            }
        }
        return null;
    }
    public function searchUser($dni)
    {
        for ($x = 0; $x < $this->numUsu; $x++) {
            if ($this->usuarios[$x]->getDni() == $dni) {
                return $this->usuarios[$x];
            }
        }
        return null;
    }
    public function handDocument($doc, $user)
    {
        if ($this->searchUser($user->getDni())) {
            if ($this->searchDocument($doc->getCodigo())) {
                $doc->prestaAUsuario($user);
            }
        }
    }
    public function returnDocument($doc)
    {
        if ($doc->estaPrestado()) {
            $doc->devuelve();
        } else {
            echo "Documento con codigo: $doc->getCodigo() no estaba prestado";
        }
    }
    public function findDocuments($titulo)
    {
        foreach ($this->documentos as $key => $value) {
            if (str_contains($value->getTitulo(), $titulo)) {
                return $value;
            }
        }
        return null;
    }
    public function showHandedReport(){
        echo "Lista de documentos prestados";
        for ($x=0; $x < $this->numDocus; $x++) {
            if($this->documentos[$x]->estaPrestado()){
                echo $this->documentos[$x];
            }
        }
        echo "Fin lista";
    }
}
