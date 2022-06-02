<?php

if(empty($_POST["oculto"]) || empty($_POST["txtnombre"]) || empty($_POST["txtdescripcion"]) || empty($_POST["txtprecio"])
|| empty($_POST["txtcodigo"]) || empty($_POST["txtclasificacion"]) || empty($_POST["txtunidad"])){
    
    header("Location: index.pro.php?mensaje=falta");
    exit();
}

include('db_pro.php');
$nombre = $_POST["txtnombre"];
$descripcion = $_POST["txtdescripcion"];
$precio = $_POST["txtprecio"];
$codigo = $_POST["txtcodigo"];
$clasificacion = $_POST["txtclasificacion"];
$unidad = $_POST["txtunidad"];
$imagen = addcslashes(file_get_contents($_FILES['Imagen']['tmp_name']),'\\');


$sentencia = $bd->prepare("INSERT INTO producto(NombreP, Descripcion, Precio, Codigo, idClasificacion, Unidad,imagen)
 VALUES(?,?,?,?,?,?,?)");
 $resultado = $sentencia->execute([$nombre, $descripcion, $precio, $codigo, $clasificacion, $unidad,$imagen]);
 if($resultado === TRUE){
     
     header("Location: index.pro.php?mensaje=exito");
 }
else{
    echo "Error al registrar";
    header("Location: index.pro.php?mensaje=error");
    exit();
}
?>