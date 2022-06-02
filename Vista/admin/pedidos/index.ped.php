<?php include 'header.ped.php' ?>

<?php include 'db_ped.php';
    $sentencia = $bd->query("SELECT * FROM pedidodetallado e INNER JOIN producto p ON e.idProducto = p.idProducto INNER JOIN pedidocabecera c 
    ON e.idPedidoCabecera = c.idPedidoCabecera INNER JOIN persona u ON e.idPersona = u.idPersona  ");
    $pedidos= $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($producto);

?>


    <div class=" row container-fluid ">
        <div class="col">
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
                <strong>Exito</strong> pedido registrado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> Imposible editar pedido.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito</strong> pedido editado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
             <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='eliminado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito</strong> pedido eliminado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='errorimg'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> al subir la imagen.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <!-- fin alertas -->
            <div class="card-header text-center ">
                Lista de pedidos    
                
            </div>
            
            <table class="table table-striped table-bordered  align-midle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">PrecioUnitario</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Descargado</th>
                        <th scope="col">idProducto</th>
                        <th scope="col">idPdidoCabecera</th>
                        <th scope="col">idPersona</th>
                        <th scope="col" colspan="2">Acciones</th>
                        
                </thead>
                <tbody>
                    <?php
                        foreach($pedidos as $dato){
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dato -> idPedidoDetallado; ?> </td>
                        <td>$<?php echo number_format($dato -> PrecioUnitario); ?></td>
                        <td><?php echo $dato -> Cantidad; ?></td>
                        <td><?php echo $dato -> Descargado; ?></td>
                        <td><?php echo $dato -> Nombre; ?></td>
                        <td><?php echo $dato -> ClaveTransaccional; ?></td>
                        <td><?php echo $dato -> Nombre; ?></td>
                        <td ><a class="text-info" href="editar.ped.php?idPedidoDetallado=<?php echo $dato -> idPedidoDetallado; ?>"><i class="bi bi-pen"></a></i></td>
                        <td ><a class="text-danger" href="eliminar.ped.php?idPedidoDetallado=<?php echo $dato -> idPedidoDetallado; ?>"><i class="bi bi-trash"></a></i></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            
        </div>
        <div class="col">
            <div class="card">
                <div class="card-helder text-center">
                    Ingresar Datos
                </div>
                <form  class="p-4" method="POST" enctype="multipart/form-data" action="registrar.php">
                    <div class="mb-3">
                        <label  class="form-label">Precio unitario:</label>
                        <input type="text" class="form-control" name="txtprecio" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Cantidad:</label>
                        <input type="number" class="form-control" name="txtcantidad" placeholder autofocus require>
                    </div>
                    <div class="mb-3 input-group">
                        <label  class="form-label">Descargado:</label>
                        <input type="text" class="form-control " name="txtdescargado" placeholder autofocus require>
                            
                        <label  class="form-label">idProducto:</label>
                        <input type="text" class="form-control" name="txtidproducto" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">idPedidoCabecera:</label>
                        <input type="number" class="form-control" name="txtidedidoCabecera" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">idPersona:</label>
                        <input type="number" class="form-control" name="txtidpersona" placeholder autofocus require>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.ped.php' ?>
