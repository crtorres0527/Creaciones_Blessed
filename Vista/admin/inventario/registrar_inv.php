<?php

if(empty($_POST["oculto"]) || empty($_POST["txtstock"]) || empty($_POST["txtsalida"])
|| empty($_POST["txtentrada"]) || empty($_POST["txtsaldo"]) || empty($_POST["txtproducto"])){
    
    header("Location: index_inv.php?mensaje=falta");
    exit();
}

include('db_inv.php');
$descripcion = $_POST["txtstock"];
$precio = $_POST["txtsalida"];
$codigo = $_POST["txtentrada"];
$clasificacion = $_POST["txtsaldo"];
$unidad = $_POST["txtproducto"];

$sentencia = $bd->prepare("INSERT INTO inventario(StockProducto, salida, Entrada, Saldo, idProducto )
 VALUES(?,?,?,?,?)");
 $resultado = $sentencia->execute([$descripcion, $precio, $codigo, $clasificacion, $unidad]);

 if($resultado === TRUE){
     
     header("Location: index_inv.php?mensaje=exito");
 }
else{
    echo "Error al registrar";
    header("Location: index_inv.php?mensaje=error");
    exit();
}
?>