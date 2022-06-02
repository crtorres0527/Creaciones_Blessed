<?php

if(empty($_POST["oculto"]) || empty($_POST["txtprecio"]) || empty($_POST["txtcantidad"]) || empty($_POST["txtdescargado"])
|| empty($_POST["txtidproducto"]) || empty($_POST["txtidedidoCabecera"] || empty($_POST["txtidpersona"]))){
    
    header("Location: index.pro.php?mensaje=falta");
    exit();
}

include('db_ped.php');
$precio = $_POST["txtprecio"];
$cantidad = $_POST["txtcantidad"];
$descargado = $_POST["txtdescargado"];
$idproducto = $_POST["txtidproducto"];
$idpedcabe = $_POST["txtidedidoCabecera"];
$idpersona = $_POST["txtidpersona"];


$sentencia = $bd->prepare("INSERT INTO pedidodetallado(PrecioUnitario, Cantidad, Descargado, idProducto,idPedidoCabecera,idPersona) 
VALUES(?,?,?,?,?,?)");
 $resultado = $sentencia->execute([$precio, $cantidad, $descargado, $idproducto, $idpedcabe, $idpersona]);
 if($resultado === TRUE){
     
     header("Location: index.ped.php?mensaje=exito");
 }
else{
    echo "Error al registrar";
    header("Location: index.ped.php?mensaje=error");
    exit();
}
?>