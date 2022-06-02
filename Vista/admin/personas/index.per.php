<?php include 'header.per.php' ?>

<?php include 'db_per.php';
    $sentencia = $bd->query("SELECT * FROM persona");
    $person= $sentencia->fetchAll(PDO::FETCH_OBJ);
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
                <strong>Exito</strong> persona registrada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> Imposible editar la persona.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito</strong> persona editada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
             <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='eliminado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito</strong> persona eliminada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <!-- fin alertas -->
            <div class="card-header text-center ">
                Lista de personas
                
            </div>
            
            <table class="table table-striped table-bordered  align-midle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Tipouser</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Numdoc</th>
                        <th scope="col">TipoDoc</th>

                        <th scope="col" colspan="2">Acciones</th>
                        
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
                        <td><?php echo $dato -> idTipousuario; ?></td>
                        <td><?php echo $dato -> User_name; ?></td>
                        <td><?php echo $dato -> password; ?></td>
                        <td><?php echo $dato -> NumeroDocumento; ?></td>
                        <td><?php echo $dato -> idTipoDocumento; ?></td>
                        <td ><a class="text-info" href="editar.per.php?idPersona=<?php echo $dato -> idPersona; ?>"><i class="bi bi-pen"></a></i></td>
                        <td ><a class="text-danger" href="eliminar.per.php?idPersona=<?php echo $dato -> idPersona; ?>"><i class="bi bi-trash"></a></i></td>
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
        <div class="col-md">
            <div class="card">
                <div class="card-helder text-center">
                    Ingresar Datos
                </div>
                <form  class="p-2" method="POST" action="registrar.php">
                    <div class="mb-3 input-group" >
                        <label  class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtnombre" placeholder autofocus require>
                        <label  class="form-label">Apellido:</label>
                        <input type="text" class="form-control" name="txtapellido" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Telefono:</label>
                        <input type="text" class="form-control" name="txttelefono" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Direccion:</label>
                        <input type="text" class="form-control" name="txtdireccion" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Correo:</label>
                        <input type="email" class="form-control" name="txtcorreo" placeholder autofocus require>
                    </div>
                    <div class="mb-3 input-group">
                        <label  class="form-label">Tipo de usuario:</label>
                        <input type="number" class="form-control" name="txttipouser" placeholder autofocus require>
                        <label  class="form-label">Usuario:</label>
                        <input type="text" class="form-control" name="txtusuario" placeholder autofocus require>
                        <label  class="form-label">contraseña:</label>
                        <input type="text" class="form-control" name="txtcontra" placeholder autofocus require>
                    </div>
                    <div class="mb-3 input-group">
                        <label  class="form-label">documento:</label>
                        <input type="text" class="form-control" name="txtnumdoc" placeholder autofocus require>
                        <label  class="form-label">TipoDocumento:</label>
                        <input type="number" class="form-control" name="txttipodoc" placeholder autofocus require>
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
<?php include 'footer.per.php' ?>
