<?php

if(!isset($_GET['idPedidoDetallado'])){
    header('Location:index.ped.php?mensaje=error');
    exit();
}
include('db_ped.php');
$idProducto = $_GET['idPedidoDetallado'];
$setencia = $bd->prepare("DELETE FROM pedidodetallado WHERE idPedidoDetallado  = ?;");
$resultado = $setencia->execute([$idProducto]);
if($resultado){
    header('Location:index.ped.php?mensaje=eliminado');
}else{
    header('Location:index.ped.php?mensaje=error');
}

?>