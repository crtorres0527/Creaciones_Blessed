<?php

if(!isset($_GET['idProducto'])){
    header('Location:index.pro.php?mensaje=error');
    exit();
}
include('db_pro.php');
$idProducto = $_GET['idProducto'];
$setencia = $bd->prepare("DELETE FROM producto WHERE idProducto = ?;");
$resultado = $setencia->execute([$idProducto]);
if($resultado){
    header('Location:index.pro.php?mensaje=eliminado');
}else{
    header('Location:index.pro.php?mensaje=error');
}

?>