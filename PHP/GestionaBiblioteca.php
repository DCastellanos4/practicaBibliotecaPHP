<?php
spl_autoload_register(function ($clase) {
    $archivo = $clase . '.php';
    if (file_exists($archivo)) {
        require_once $archivo;
    }
});
$b=new Biblioteca();
$l1=new Libro("001","Leyenda",1850);
$b->addDocument($l1);
$l2=new Libro("002","El Quijote",1590);
$b->addDocument($l2);
$r1=new Revista("003","National Geography");
$b->addDocument($r1);
$juan=new Socio("123456","Juan");
$b->addUser($juan);
$b->addUser(new UsuarioOcasional("76434555","Pedro"));
//NO SE PUEDE DEVOLVER SI NO SE HA PRESTADO
//$b->returnDocument($l1);
$b->handDocument($l1,$juan);
$b->handDocument($r1,$juan);
$b->showHandedReport();
