<?php include("header.per.php")?>
<?php 
    if (!isset($_GET['idPersona'])){
        header("Location: index.per.php?mensaje=error");
        exit();
    }

    include ('db_per.php');
    $codigo = $_GET['idPersona'];

    $sentencia = $bd->prepare("SELECT * FROM persona WHERE idPersona = ?");
    $sentencia->execute([$codigo]);
    $person = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($producto);
    

?>
<div class="container">
    <div class="row">
        <div class="col-md ">
            <h1 class="text-center">Editar Persona</h1>
            <div class="card">
                <div class="card-helder text-center">
                    Ingresar Datos
                </div>
                <form  class="p-2" method="POST" action="edit2.php">
                    <div class="mb-3">
                        <label  class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtnombre" value="<?php echo $person-> Nombre; ?>" placeholder autofocus require>
                        <label  class="form-label">Apellido:</label>
                        <input type="text" class="form-control" name="txtapellido" value="<?php echo $person-> Apellido; ?>" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Telefono:</label>
                        <input type="text" class="form-control" name="txttelefono" value="<?php echo $person-> Telefono; ?>" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Direccion:</label>
                        <input type="text" class="form-control" name="txtdireccion" value="<?php echo $person-> Direccion; ?>" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Correo:</label>
                        <input type="email" class="form-control" name="txtcorreo" value="<?php echo $person-> Correo_electornico; ?>" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">TipoUsuario:</label>
                        <input type="number" class="form-control" name="txttipouser" value="<?php echo $person-> idTipousuario ; ?>" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Usuario:</label>
                        <input type="text" class="form-control" name="txtuser" value="<?php echo $person-> User_name ; ?>" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Contraseña:</label>
                        <input type="number" class="form-control" name="txtcontra" value="<?php echo $person-> password; ?>" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Documento:</label>
                        <input type="text" class="form-control" name="txtdoc" value="<?php echo $person-> NumeroDocumento;?>" placeholder autofocus require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">TipoDocumento:</label>
                        <input type="text" class="form-control" name="txttipodoc" value="<?php echo $person-> idTipoDocumento;?>" placeholder autofocus require>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="ref" value="<?php echo $person-> idPersona; ?>" >
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.per.php")   ?>    