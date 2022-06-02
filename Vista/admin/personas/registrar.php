<?php

if(empty($_POST["oculto"]) || empty($_POST["txtnombre"]) || empty($_POST["txtapellido"]) || empty($_POST["txttelefono"])
|| empty($_POST["txtdireccion"]) || empty($_POST["txtcorreo"]) || empty($_POST["txttipodoc"]) || empty($_POST["txtnumdoc"])
|| empty($_POST["txttipouser"]) || empty($_POST["txtusuario"])){
    
    header("Location: index.per.php?mensaje=falta");
    exit();
}

include('db_per.php');
$nombre = $_POST["txtnombre"];
$apellido = $_POST["txtapellido"];
$telefono = $_POST["txttelefono"];
$direccion = $_POST["txtdireccion"];
$correo = $_POST["txtcorreo"];
$tipouser = $_POST["txttipouser"];
$usuario = $_POST["txtusuario"];
$contra = $_POST["txtcontra"];
$numdoc = $_POST["txtnumdoc"];
$tipodoc = $_POST["txttipodoc"];


$sentencia = $bd->prepare("INSERT INTO persona(Nombre, Apellido, Telefono, Direccion, Correo_electornico, idTipoUsuario,User_name,password,numerodocumento,idTipoDocumento
) VALUES(?,?,?,?,?,?,?,?,?,?)");
$resultado = $sentencia->execute([$nombre,$apellido,$telefono,$direccion,$correo,$tipouser,$usuario,$contra,$numdoc,$tipodoc]);
 if($resultado === TRUE){
     
     header("Location: index.per.php?mensaje=exito");
 }
else{
    echo "Error al registrar";
    header("Location: index.per.php?mensaje=error");
    exit();
}
?>