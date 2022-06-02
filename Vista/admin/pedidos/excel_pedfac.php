<?php include 'db_ped.php';
    $sentencia = $bd->query("SELECT * FROM pedidocabecera");
    $pedfac= $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($producto);

?>
<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte_pedidosfac.xls");
?>
<table class="table table-striped table-bordered  align-midle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">clave</th>
                        <th scope="col">PaypalDatos</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Total</th>
                        <th scope="col"> Status</th>                     
                </thead>
                <tbody>
                    <?php
                        foreach($pedfac as $dato){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dato -> idPedidoCabecera ; ?> </td>
                        <td><?php echo $dato -> ClaveTransaccional; ?></td>
                        <td><?php echo $dato -> PaypalDatos; ?></td>
                        <td><?php echo $dato -> Fecha; ?></td>
                        <td><?php echo $dato -> Correo; ?></td>
                        <td><?php echo $dato -> Total; ?></td>
                        <td><?php echo $dato -> Status; ?></td>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
