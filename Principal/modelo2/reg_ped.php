<?php
print_r($_POST);
if(empty($_POST["oculto"]) || empty($_POST["txtusuario"]) || empty($_POST["txtproducto"]) || empty($_POST["txtcantidad"])|| empty($_POST["txtcorreo"]) || empty($_POST["txttelefono"])){
    header("Location:../compra.php?mensaje=falta");
    exit();
}
include_once'db_ped.php'; 
$usuario = $_POST['txtusuario'];
$producto = $_POST['txtproducto'];
$cantidad = $_POST['txtcantidad'];
$correo = $_POST['txtcorreo'];
$telefono = $_POST['txttelefono'];
$sentencia = $bd->prepare("INSERT INTO procesopedido (usuario, producto, cantidad, email, numero) VALUES (?,?,?,?,?);");
$result = $sentencia->execute([$usuario, $producto, $cantidad, $correo, $telefono]);
if($result == true){
    header("Location:fin.php?mensaje=exito");
    exit();
}else{
    header("Location:../compra.php?mensaje=error");
    exit();
}

?>