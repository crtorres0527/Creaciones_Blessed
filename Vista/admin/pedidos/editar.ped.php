<?php include("header.ped.php")?>
<?php 
    if (!isset($_GET['idPedidoDetallado'])){
        header("Location: index.ped.php?mensaje=error");
        exit();
    }

    include ('db_ped.php');
    $codigo = $_GET['idPedidoDetallado'];

    $sentencia = $bd->prepare("SELECT * FROM pedidodetallado WHERE idPedidoDetallado = ?");
    $sentencia->execute([$codigo]);
    $pedido = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($producto);
    

?>
<div class="container">
    <div class="row">
    <div class="col">
            <div class="card">
                <div class="card-helder text-center">
                    Ingresar Datos
                </div>
                <form  class="p-4" method="POST" action="edit2.php">
                    <div class="mb-3">
                        <label  class="form-label">Precio unitario:</label>
                        <input type="text" class="form-control" name="txtprecio" placeholder autofocus
                        value="<?php echo $pedido-> PrecioUnitario; ?>"require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Cantidad:</label>
                        <input type="number" class="form-control" name="txtcantidad" placeholder autofocus 
                        value="<?php echo $pedido-> Cantidad; ?>" require>
                    </div>
                    <div class="mb-3 input-group">
                        <label  class="form-label">Descargado:</label>
                        <input type="text" class="form-control " name="txtdescargado" placeholder autofocus
                        value="<?php echo $pedido-> Descargado; ?>" require>
                            
                        <label  class="form-label">idProducto:</label>
                        <input type="text" class="form-control" name="txtidproducto" placeholder 
                         value="<?php echo $pedido-> idProducto; ?>">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">idPedidoCabecera:</label>
                        <input type="number" class="form-control" name="txtidedidoCabecera" placeholder autofocus 
                        value="<?php echo $pedido-> idPedidoCabecera; ?>"require>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">idPersona:</label>
                        <input type="number" class="form-control" name="txtidpersona" placeholder autofocus 
                        value="<?php echo $pedido-> idPersona; ?>"require>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="ref" value="<?php echo $pedido-> idPedidoDetallado; ?>" >
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.ped.php")   ?>    