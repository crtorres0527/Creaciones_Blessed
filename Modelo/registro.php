<?php 

include("../Conexion/conectar.php");

if (isset($_POST['registrar'])){
   if(strlen($_POST['usuario']) >= 1 && 
      strlen($_POST['password']) >= 1 && 
      strlen($_POST['nombre']) >= 1 &&
      strlen($_POST['apellido']) >= 1 &&
      strlen($_POST['telefono']) >= 1 &&
      strlen($_POST['direccion']) >= 1 &&
      strlen($_POST['NumeroDocumento']) >= 1 &&
      strlen($_POST['correo']) >= 1){
       $usuario = trim($_POST['usuario']);
       $password = trim($_POST['password']);
       $nombre = trim($_POST['nombre']);
       $apellido = trim($_POST['apellido']);
       $telefono = trim($_POST['telefono']);
       $direccion = trim($_POST['direccion']);
       $NumeroDocumento = trim($_POST['NumeroDocumento']);
       $correo = trim($_POST['correo']);
       $consulta = "INSERT INTO persona(Nombre, Apellido, Telefono, Direccion,
        Correo_electornico, idTipousuario, User_name, password,NumeroDocumento, idTipoDocumento) VALUES ('$nombre','$apellido',
        '$telefono','$direccion','$correo','2','$usuario','$password','$NumeroDocumento', '1')";
       $resultado = mysqli_query($conexion, $consulta);
       if ($resultado){
           ?>
           <h3 class="ok">¡Registro Exitoso!</h3>
           <?php
       }else{
           ?>
           <h3 class="bad">¡No se pudo registrar, ocurrio un error!</h3>
           <?php
       } 
   }else{
    ?>
    <h3 class="bad">¡Porfavor Completa los campos!</h3>
    <?php
   }
}

?>