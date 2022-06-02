<?php
include("../Conexion/conectar.php");

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$consulta="SELECT * FROM persona WHERE User_name='$usuario' AND password='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);
if(isset($filas)){
if($filas['idTipousuario']==1){
    header('location:../Vista/admin/base_adm.php');
}else if($filas['idTipousuario']==2){
    header('location:../Vista/index.php');
}
}else{
    ?>
    <?php
    include("../Vista/login.php");
    ?>
    <h1 class="bad">Comprueba los campos</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>