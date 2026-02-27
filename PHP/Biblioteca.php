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
    public function addDocument($cod, $tit, $tipo, $anio)
    {
        require_once 'funciones.php';
        try {
            $con = conectar();
            $stmt = $con->prepare("INSERT INTO documentos (codigo, titulo, tipo,anio)
            VALUES (:cod, :tit, :tip,:anio)");
            $stmt->execute([":cod" => $cod, ":tit" => $tit, ":tip" => $tipo, ":anio" => $anio]);
            echo "<p style='color:green'>Introducido<br>
                                    CODIGO: $cod<br>
                                    TITULO: $tit<br>
                                    TIPO: $tipo<br>
                                    AÑO: $anio</p>";
            echo "<br>";
        } catch (Exception $e) {
            echo $e->getMessage();
            echo "<br>";
        }
    }
    public function addUser($dni, $nombre, $tipo, $numPrestamos, $maxPrestamos)
    {
        require_once 'funciones.php';
        try {
            $con = conectar();
            $stmt = $con->prepare("INSERT INTO usuarios (dni, nombre, tipo,numPrestamos,maxPrestamos)
            VALUES (:dni, :nombre, :tipo,:numPrestamos,:maxPrestamos)");
            $stmt->execute([":dni" => $dni, ":nombre" => $nombre, ":tipo" => $tipo, ":numPrestamos" => $numPrestamos, "maxPrestamos" => $maxPrestamos]);
            echo "<p style='color:green'>Introducido<br>
                                    DNI: $dni<br>
                                    NOMBRE: $nombre<br>
                                    TIPO: $tipo<br>
                                    MAX_PRESTAMOS: $maxPrestamos";
            echo "<br>";
        } catch (Exception $e) {
            echo $e->getMessage();
            echo "<br>";
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
    public function handDocument($codDoc, $dniUser,$fechaEntrega,$fechaDevolucion)
    {
        require_once 'funciones.php';
        try {
            $con = conectar();
            $stmt = $con->prepare("INSERT INTO prestamos (dniUsuario, codigoLibro, fechaEntrega,fechaDevolucion)
            VALUES (:dniUsuario, :codigoLibro, :fechaEntrega,:fechaDevolucion)");
            $stmt->execute([":dniUsuario" => $dniUser, ":codigoLibro" => $codDoc, ":fechaEntrega" => $fechaEntrega, ":fechaDevolucion" => $fechaDevolucion]);
            echo "<p style='color:green'>Prestado<br>";
            echo "<br>";
        } catch (Exception $e) {
            echo $e->getMessage();
            echo "<br>";
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
    public function showHandedReport()
    {
        try {
            require 'funciones.php';
            $con = conectar();
            $stmt = $con->prepare("SELECT
                    (SELECT nombre FROM usuarios WHERE dni = p.dniUsuario) AS nombreUsuario,
                    (SELECT titulo FROM documentos WHERE codigo = p.codigoLibro) AS nombreLibro,
                    p.fechaEntrega,
                    p.fechaDevolucion,p.dniUsuario,p.codigoLibro
                FROM prestamos p");
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($resultados) {
                echo "<table border='1' style='border-collapse: collapse; width: 100%; font-family: sans-serif;'>";
                echo "<thead style='background-color: #4CAF50; color: white;'>
                    <tr>
                        <th>Usuario</th>
                        <th>Documento</th>
                        <th>Entrega</th>
                        <th>Devolución</th>
                        <th>Acción</th>
                    </tr>
                  </thead>";
                echo "<tbody>";
                foreach ($resultados as $fila) {
                    $usuario = $fila['nombreUsuario'] ?? "<em>No encontrado</em>";
                    $libro = $fila['nombreLibro'] ?? "<em>No encontrado</em>";
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($usuario) . "</td>";
                    echo "<td>" . htmlspecialchars($libro) . "</td>";
                    echo "<td>{$fila['fechaEntrega']}</td>";
                    echo "<td>" . ($fila['fechaDevolucion'] ?: 'Pendiente') . "</td>";
                    echo "<td><a href='devolver.php?dni={$fila['dniUsuario']}&id={$fila['codigoLibro']}'><button>Entregar</button></a></td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "No hay registros disponibles.";
            }
        } catch (PDOException $e) {
            echo "Error de base de datos: " . $e->getMessage();
        }
    }

    /**
     * Get the value of maxUsuarios
     */
    public function getMaxUsuarios()
    {
        return $this->maxUsuarios;
    }

    /**
     * Set the value of maxUsuarios
     *
     * @return  self
     */
    public function setMaxUsuarios($maxUsuarios)
    {
        $this->maxUsuarios = $maxUsuarios;

        return $this;
    }
}
