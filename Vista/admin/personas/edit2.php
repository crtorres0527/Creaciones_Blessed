<?php 
print_r($_POST);

if (!isset($_POST['ref'])){

    header('Location: index.per.php?mensaje=error');
}

include('db_per.php');
$ref = $_POST['ref'];
$nombre = $_POST['txtnombre'];
$apellido = $_POST['txtapellido'];
$telefono = $_POST['txttelefono'];
$direccion = $_POST['txtdireccion'];
$correo = $_POST['txtcorreo'];
$tipouser = $_POST['txttipouser'];
$usuario = $_POST['txtuser'];
$contra = $_POST['txtcontra'];
$numdoc = $_POST['txtdoc'];
$tipodoc = $_POST['txttipodoc'];



$sentencia = $bd->prepare("UPDATE persona SET Nombre = ?, Apellido = ?, Telefono = ?, Direccion = ?, Correo_electornico = ?, idTipousuario = ?, User_name = ?, password = ?, NumeroDocumento = ?, idTipodocumento = ? WHERE idPersona = ?");
$resultado = $sentencia->execute([$nombre, $apellido, $telefono, $direccion, $correo, $tipouser, $usuario, $contra, $numdoc, $tipodoc, $ref]);



if($resultado === TRUE){
    header('Location: index.per.php?mensaje=editado');
}else{
    header('Location: index.per.php?mensaje=error');
}
?>