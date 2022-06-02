<?php
   include('../Conexion/conectar.php');
   $persona = "SELECT * FROM persona";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Vista/EstiloTabla.css" media="screen" />
    <title>Tabla</title>
</head>
<body>
<div class="container">
       <table class="table table-striped table-bordered">
       <tr>
            <th>ID Persona</th>
            <th>Nombre</th>
            <th>Apelldio</th>
            <th>Telofono</th>
            <th>Direccion</th>
            <th>Correo Electronico</th>
            <th>ID Tipo De Usuario</th>
            <th>Username</th>
            <th>Password</th>
            <th>ID Tipo De Documento</th>
        </tr>
           <?php 
           if($conexion){
               echo "si";
           }else{
               echo "no";
           }
           $resultado = mysqli_query($conexion, $persona);
           while($row=mysqli_fetch_assoc($resultado)) { 
               ?>
        <tr>


            <td><?php echo $row["IDPersona"];?></td>
            <td><?php echo $row["Nombre"];?></td>
            <td><?php echo $row["Apellido"];?></td>
            <td><?php echo $row["Telefono"];?></td>
            <td><?php echo $row["Direccion"];?></td>
            <td><?php echo $row["CorreoElectronico"];?></td>
            <td><?php echo $row["ID_TipoUsuario"];?></td>
            <td><?php echo $row["UserName"];?></td>
            <td><?php echo $row["Password"];?></td>
            <td><?php echo $row["ID_TipoDocumento"];?></td>
        </tr>
            <?php } ?>
       </table>
</div>
</body>
</html>