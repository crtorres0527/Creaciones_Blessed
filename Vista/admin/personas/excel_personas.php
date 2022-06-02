<?php include 'db_per.php';
    $sentencia = $bd->query("SELECT * FROM persona");
    $person= $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($producto);

?>
<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte_personas.xls");
?>
<table class="table table-striped table-bordered  align-midle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">#Usuario</th> 
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>                     
                        <th scope="col">NumeroDocumento</th>    
                        <th scope="col">#Documento</th>                 
                                            
                                             
                </thead>
                <tbody>
                    <?php
                        foreach($person as $dato){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dato -> idPersona; ?> </td>
                        <td><?php echo $dato -> Nombre; ?></td>
                        <td><?php echo $dato -> Apellido; ?></td>
                        <td><?php echo $dato -> Telefono; ?></td>
                        <td><?php echo $dato -> Direccion; ?></td>
                        <td><?php echo $dato -> Correo_electornico; ?></td>
                        <td><?php echo $dato ->  idTipousuario; ?></td>
                        <td><?php echo $dato ->  User_name; ?></td>
                        <td><?php echo $dato ->  password; ?></td>
                        <td><?php echo $dato ->  NumeroDocumento; ?></td>
                        <td><?php echo $dato -> idTipoDocumento; ?></td>
                    <?php
                        }
                    ?>
                </tbody>
            </table>