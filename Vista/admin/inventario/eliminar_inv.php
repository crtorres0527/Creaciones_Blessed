<?php

if(!isset($_GET['idInventario'])){
    header('Location:index_inv.php?mensaje=error');
    exit();
}
include('db_inv.php');
$idInventario = $_GET['idInventario'];
$setencia = $bd->prepare("DELETE FROM inventario WHERE idInventario = ?;");
$resultado = $setencia->execute([$idInventario]);
if($resultado){
    header('Location:index_inv.php?mensaje=eliminado');
}else{
    header('Location:index_inv.php?mensaje=error2');
}

?>