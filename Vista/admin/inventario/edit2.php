<?php 
//print_r($_POST);

if (!isset($_POST['ref'])){

    header('Location: index_inv.php?mensaje=error');
}

include('db_inv.php');
$ref = $_POST['ref'];
$codigo = $_POST['txtcodigo'];
$stock = $_POST['txtstock'];
$salida = $_POST['txtsalida'];
$entrada= $_POST['txtentrada'];
$saldo = $_POST['txtsaldo'];
$producto = $_POST['txtproducto'];

$sentencia = $bd->prepare("UPDATE inventario SET CodigoProducto = ?,StockProducto = ?, salida = ?, Entrada = ?, Saldo = ?, idProducto = ? WHERE idInventario = ?");
$resultado = $sentencia->execute([$codigo, $stock, $salida, $entrada, $saldo, $producto, $ref]);

if($resultado === TRUE){
    header('Location: index_inv.php?mensaje=editado');
}else{
    header('Location: index_inv.php?mensaje=error');
}
?>