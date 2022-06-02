<?php include("header.pro.php")?>
<?php 
    if (!isset($_GET['idProducto'])){
        header("Location: index.pro.php?mensaje=error");
        exit();
    }

    include ('db_pro.php');
    $codigo = $_GET['idProducto'];

    $sentencia = $bd->prepare("SELECT * FROM producto WHERE idProducto = ?");
    $sentencia->execute([$codigo]);
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($producto);
    

?>
<div class="container">
    <div class="row">
        <div class="col-md ">
            <h1 class="text-center">Editar Producto</h1>
            <div class="card">
                <div class="card-helder text-center">
                   <h5>Ingresar Datos:</h5> 
                </div>
                <form  class="p-4" method="POST" action="edit2.php">
                    <div class="mb-3">
                        <label  class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtnombre" placeholder 
                        value="<?php echo $producto-> NombreP; ?>" >
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Descripcion:</label>
                        <textarea class="form-control"  name="txtdescripcion" 
                        value="<?php echo $producto-> Descripcion; ?>" ></textarea>
                    </div>
                    <div class="mb-3 input-group">
                        <label  class="form-label">Precio:</label>
                        <input type="text" class="form-control " name="txtprecio" placeholder autofocus required
                        value="<?php echo $producto-> Precio; ?>" 
                        >
                            
                        <label  class="form-label">Codigo:</label>
                        <input type="text" class="form-control" name="txtcodigo" placeholder autofocus required
                        value="<?php echo $producto-> Codigo; ?>" >
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">clasificacion:</label>
                        <input type="number" class="form-control" name="txtclasificacion" placeholder autofocus required
                        value="<?php echo $producto-> idClasificacion; ?>" >
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Unidad:</label>
                        <input type="number" class="form-control" name="txtunidad" placeholder autofocus required
                        value="<?php echo $producto-> Unidad; ?>" >
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="ref" value="<?php echo $producto-> idProducto; ?>" >
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>


                </form>
            </div>
       </div>
    </div>
</div>

<?php include("footer.pro.php")   ?>    