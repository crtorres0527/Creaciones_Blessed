<?php
$contrasena ="";
$usuario ="root";
$nombre_bd="proyecto_blessed";

try{
    $bd = new PDO(
        'mysql:host=localhost;
        dbname='.$nombre_bd, 
        $usuario, 
        $contrasena,
        array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (PDOException $e) {
    echo "Error: problem conection" . $e->getMessage();
}
?>
