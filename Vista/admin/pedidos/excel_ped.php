<?php include 'db_ped.php';
    $sentencia = $bd->query("SELECT * FROM pedidodetallado");
    $ped= $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($producto);

?>
<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte_pedidos.xls");
?>
<table class="table table-striped table-bordered  align-midle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">PrecioUnitario</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Descargado</th>
                        <th scope="col">idProducto</th>
                        <th scope="col">idPedidoCabecera</th>
                        <th scope="col">idPersona</th>                     
                </thead>
                <tbody>
                    <?php
                        foreach($ped as $dato){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dato -> idPedidoDetallado  ; ?> </td>
                        <td><?php echo $dato -> PrecioUnitario; ?></td>
                        <td><?php echo $dato -> Cantidad; ?></td>
                        <td><?php echo $dato -> Descargado; ?></td>
                        <td><?php echo $dato -> idProducto ; ?></td>
                        <td><?php echo $dato -> idPedidoCabecera ; ?></td>
                        <td><?php echo $dato -> idPersona ; ?></td>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
