<?php include 'db_pro.php';
    $sentencia = $bd->query("SELECT * FROM producto");
    $producto= $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($producto);

?>
<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte_productos.xls");
?>
<table class="table table-striped table-bordered  align-midle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Clasif</th>
                        <th scope="col"> Unidad</th>                     
                </thead>
                <tbody>
                    <?php
                        foreach($producto as $dato){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dato -> idProducto; ?> </td>
                        <td><?php echo $dato -> Nombre; ?></td>
                        <td><?php echo $dato -> Descripcion; ?></td>
                        <td><?php echo $dato -> Precio; ?></td>
                        <td><?php echo $dato -> Codigo; ?></td>
                        <td><?php echo $dato -> idClasificacion; ?></td>
                        <td><?php echo $dato -> Unidad; ?></td>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
