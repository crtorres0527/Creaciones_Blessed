<?php

if(!isset($_GET['idPersona'])){
    header('Location:index.per.php?mensaje=error');
    exit();
}
include('db_per.php');
$idPersona = $_GET['idPersona'];
$setencia = $bd->prepare("DELETE FROM persona WHERE idPersona = ?;");
$resultado = $setencia->execute([$idPersona]);
if($resultado){
    header('Location:index.per.php?mensaje=eliminado');
}else{
    header('Location:index.per.php?mensaje=error');
}

?>