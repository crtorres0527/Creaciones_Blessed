<?php include 'db_inv.php';
    $sentencia = $bd->query("SELECT * FROM inventario ");
    $inv= $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte_inventario.xls");
?>
<table class="table table-striped table-bordered  align-midle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CODIGO</th>
                        <th scope="col">STOCK</th>
                        <th scope="col">SALIDA</th>
                        <th scope="col">ENTRADA</th>
                        <th scope="col">SALDO</th>
                        <th scope="col">IDPRODUCTO</th>                        
                </thead>
                <tbody>
                    <?php
                        foreach($inv as $dato){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dato -> idInventario; ?> </td>
                        <td><?php echo $dato ->CodigoProducto; ?></td>
                        <td><?php echo $dato ->StockProducto; ?></td>
                        <td><?php echo $dato ->salida; ?></td>
                        <td><?php echo $dato ->Entrada; ?></td>
                        <td><?php echo $dato ->Saldo; ?></td>
                        <td><?php echo $dato ->idProducto; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table> 