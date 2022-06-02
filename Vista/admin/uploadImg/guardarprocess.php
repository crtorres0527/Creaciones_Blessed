<?php 

include ("db_pro.php");

$nombre = $_POST['nombre'];
$img= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "INSERT INTO producto (imagen) VALUES ('$img')";
$result = $bd->query($query);

if($result){
    echo "Imagen Guardada";

}else{
    echo "Error al Guardar";
}    

?>