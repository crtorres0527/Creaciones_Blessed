<?php 
print_r($_POST);

if (!isset($_POST['ref'])){

    header('Location: index.ped.php?mensaje=error');
}

include('db_ped.php');
$ref = $_POST['ref'];
$nombre = $_POST['txtprecio'];
$descripcion = $_POST['txtcantidad'];
$precio = $_POST['txtdescargado'];
$codigo= $_POST['txtidproducto'];
$clasificacion = $_POST['txtidedidoCabecera'];
$unidad = $_POST['txtidpersona'];


$sentencia = $bd->prepare("UPDATE pedidodetallado SET PrecioUnitario = ?, Cantidad = ?, Descargado = ?, idProducto  = ?, idPedidoCabecera  = ?, idPersona  = ? WHERE idPedidoDetallado  = ?");
$resultado = $sentencia->execute([$nombre, $descripcion, $precio, $codigo, $clasificacion, $unidad, $ref]);

if($resultado === TRUE){
    header('Location: index.ped.php?mensaje=editado');
}else{
    header('Location: index.ped.php?mensaje=error');
}
?>