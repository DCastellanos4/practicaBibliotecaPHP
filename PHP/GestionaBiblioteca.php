<?php
// spl_autoload_register(function ($clase) {
//     $archivo = $clase . '.php';
//     if (file_exists($archivo)) {
//         require_once $archivo;
//     }
// });
// $b = new Biblioteca();
// $l1 = new Libro("001", "Leyenda", 1850);
// $b->addDocument($l1);
// $l2 = new Libro("002", "El Quijote", 1590);
// $b->addDocument($l2);
// $r1 = new Revista("003", "National Geography");
// $b->addDocument($r1);
// $juan = new Socio("123456", "Juan");
// $b->addUser($juan);
// $b->addUser(new UsuarioOcasional("76434555", "Pedro"));
// //NO SE PUEDE DEVOLVER SI NO SE HA PRESTADO
// //$b->returnDocument($l1);
// $b->handDocument($l1, $juan);
// $b->handDocument($r1, $juan);
// $b->showHandedReport();
//2 formularios 1 para recoger socios otro para recoger libros
// otro para dar y recoger libros
//BBDD para guardar la informacion
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style='text-align: center;'>
    <h1>Sistema de gestion de bibliotecas</h1>
    <a href="insertaLibro.php"><button>Introducir libro</button></a>
    <br><br>
    <a href="insertaUsuario.php"><button>Introducir usuario</button></a>
    <br><br>
    <a href="gestionaPrestamos.php"><button>Gestión de prestamos</button></a>
    <br><br>
    <a href="darPrestamos.php"><button>Dar prestamos</button></a>
</body>

</html>
