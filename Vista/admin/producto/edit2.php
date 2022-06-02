<?php 
print_r($_POST);

if (!isset($_POST['ref'])){

    header('Location: index.pro.php?mensaje=error');
}

include('db_pro.php');
$ref = $_POST['ref'];
$nombre = $_POST['txtnombre'];
$descripcion = $_POST['txtdescripcion'];
$precio = $_POST['txtprecio'];
$codigo= $_POST['txtcodigo'];
$clasificacion = $_POST['txtclasificacion'];
$unidad = $_POST['txtunidad'];


$sentencia = $bd->prepare("UPDATE producto SET NombreP = ?, Descripcion = ?, Precio = ?, Codigo = ?, idClasificacion = ?, Unidad = ? WHERE idProducto = ?");
$resultado = $sentencia->execute([$nombre, $descripcion, $precio, $codigo, $clasificacion, $unidad, $ref]);

if($resultado === TRUE){
    header('Location: index.pro.php?mensaje=editado');
}else{
    header('Location: index.pro.php?mensaje=error');
}
?>