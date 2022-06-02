<?php include 'header_inv.php' ?>
<?php include 'db_inv.php';
    $sentencia = $bd->query("SELECT * FROM inventario i INNER JOIN producto p ON i.idProducto = p.idProducto");
    $inv= $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($producto);

?>


    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alertas -->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> Verifica todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='exito'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito</strong> dato del inventario registrado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> Imposible editar dato del inventario
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='error2'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> Imposible eliminar dato del inventario.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito</strong> Dato del inventario editado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
             <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='eliminado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito</strong> Dato del inventario eliminado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <!-- fin alertas -->
            <div class="card-header text-center ">
                INVENTARIO DE PRODUCTOS
                
            </div>
            
            <table class="table table-striped table-bordered  align-midle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">STOCK</th>
                        <th scope="col">SALIDA</th>
                        <th scope="col">ENTRADA</th>
                        <th scope="col">SALDO</th>
                        <th scope="col">IDPRODUCTO</th>
                        <th scope="col" colspan="2">Acciones</th>
                        
                </thead>
                <tbody>
                    <?php
                        foreach($inv as $dato){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dato -> idInventario; ?> </td>
                        <td><?php echo $dato ->StockProducto; ?></td>
                        <td><?php echo $dato ->salida; ?></td>
                        <td><?php echo $dato ->Entrada; ?></td>
                        <td><?php echo $dato ->Saldo; ?></td>
                        <td><?php echo $dato ->NombreP; ?></td>
                        <td ><a class="text-info" href="editar_inv.php?idInventario=<?php echo $dato -> idInventario; ?>"><i class="bi bi-pen"></a></i></td>
                        <td ><a class="text-danger" href="eliminar_inv.php?idInventario=<?php echo $dato -> idInventario; ?>"><i class="bi bi-trash"></a></i></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table> 
        </div>
        <div class="col-md-5 ">
            <div class="card">
                <div class="card-helder text-center">
                    Ingresar Datos:
                </div>
                <form  class="p-4" method="POST" action="registrar_inv.php">
                    <div class="mb-3">
                        <label  class="form-label">stock:</label>
                        <input type="number" class="form-control" name="txtstock" placeholder autofocus require>
                    </div>
                    <div class="mb-3 input-group">
                        <label  class="form-label">Salida:</label>
                        <input type="number" class="form-control " name="txtsalida" placeholder autofocus require>
                            
                        <label  class="form-label">Entrada:</label>
                        <input type="text" class="form-control" name="txtentrada" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Saldo:</label>
                        <input type="number" class="form-control" name="txtsaldo" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">IdProducto</label>
                        <input type="number" class="form-control" name="txtproducto" placeholder autofocus require>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
                <a class="text-dark " href="reporte/reporte_inv.php"><i class="bi bi-archive-fill"></i></a></i>
            </div>
        </div>
    </div>
</div>
<?php include 'footer_inv.php' ?>
