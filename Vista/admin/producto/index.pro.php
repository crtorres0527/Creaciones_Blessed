<?php include 'header.pro.php' ?>

<?php include 'db_pro.php';
    $sentencia = $bd->query("SELECT * FROM producto p INNER JOIN clasificacion c ON p.idClasificacion = c.idClasificacion");
    $producto= $sentencia->fetchAll(PDO::FETCH_OBJ);
    $sentencia2 = $bd->query("SELECT * FROM clasificacion");
    $clasificacion= $sentencia2->fetchAll(PDO::FETCH_OBJ);
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
                <strong>Exito</strong> producto registrado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> Imposible editar producto.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito</strong> producto editado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
             <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='eliminado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito</strong> producto eliminado.
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
                Lista de productos
                
            </div>
            
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
                        <th scope="col">Imagen</th>
                        <th scope="col" colspan="2">Acciones</th>
                        
                </thead>
                <tbody>
                    <?php
                        foreach($producto as $dato){ 
                        foreach($clasificacion as $dato2);
                    ?>
                    <tr>
                        <td scope="row"><?php echo $dato -> idProducto; ?> </td>
                        <td scope="row"><?php echo $dato -> NombreP; ?></td>
                        <td scope="row"><?php echo $dato -> Descripcion; ?></td>
                        <td scope="row">$ <?php echo number_format($dato -> Precio); ?></td>
                        <td scope="row"><?php echo $dato -> Codigo; ?></td>
                        <td scope="row"><?php echo $dato -> Descripcion; ?></td>                       
                        <td scope="row"><?php echo $dato -> Unidad; ?></td>
                        <td><img width="100" src="data:png;base64,<?php echo  base64_encode($row['imagen']); ?>"></td>
                        <td ><a class="text-info" href="editar.pro.php?idProducto=<?php echo $dato -> idProducto; ?>"><i class="bi bi-pen"></a></i></td>
                        <td ><a class="text-danger" href="eliminar.pro.php?idProducto=<?php echo $dato -> idProducto; ?>"><i class="bi bi-trash"></a></i></td>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
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
                        <label  class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtnombre" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Descripcion:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="txtdescripcion" rows="2" require></textarea>
                    </div>
                    <div class="mb-3 input-group">
                        <label  class="form-label">Precio:</label>
                        <input type="text" class="form-control " name="txtprecio" placeholder autofocus require>
                            
                        <label  class="form-label">Codigo:</label>
                        <input type="text" class="form-control" name="txtcodigo" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Clasificacion:</label>
                        <select class="form-control" name="txtclasificacion" require>

                            <option value="">Seleccione</option>
                            <?php
                                foreach($clasificacion as $dato){
                            ?>
                            <option value="<?php echo $dato -> idClasificacion; ?>"><?php echo $dato -> Descripcion; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Unidad:</label>
                        <input type="number" class="form-control" name="txtunidad" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Imagen:</label>
                        <input type="file" class="form-control" name="Imagen">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
                <a class="text-dark " href="reporte/reporte_pro.php"><i class="bi bi-archive-fill"></i></a></i>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.pro.php' ?>
