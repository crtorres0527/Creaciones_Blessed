<?php include("header_inv.php")?>
<?php 
    if (!isset($_GET['idInventario'])){
        header("Location: index_inv.php?mensaje=error");
        exit();
    }

    include ('db_inv.php');
    $codigo = $_GET['idInventario'];

    $sentencia = $bd->prepare("SELECT * FROM inventario WHERE idInventario = ?");
    $sentencia->execute([$codigo]);
    $inv = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($inv);
    

?>
<div class="container">
    <div class="row">
        <div class="col-md ">
            <h1 class="text-center">Editar inventario</h1>
            <div class="card">
                <div class="card-helder text-center">
                   <h5>Ingresar Datos:</h5> 
                </div>
                <form  class="p-4" method="POST" action="edit2.php">
                    <div class="mb-3">
                        <label  class="form-label">Codigo:</label>
                        <input type="text" class="form-control" name="txtcodigo" placeholder 
                        value="<?php echo $inv->CodigoProducto ; ?>" >
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Stock:</label>
                        <input type="number" class="form-control" name="txtstock" placeholder 
                        value="<?php echo $inv->StockProducto; ?>" >
                    </div>
                    <div class="mb-3 input-group">
                        <label  class="form-label">Salida:</label>
                        <input type="number" class="form-control " name="txtsalida" placeholder autofocus required
                        value="<?php echo $inv->salida; ?>" 
                        >
                            
                        <label  class="form-label">Entrada:</label>
                        <input type="text" class="form-control" name="txtentrada" placeholder autofocus required
                        value="<?php echo $inv-> Entrada; ?>" >
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Saldo:</label>
                        <input type="number" class="form-control" name="txtsaldo" placeholder autofocus required
                        value="<?php echo $inv-> Saldo; ?>" >
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">idProducto:</label>
                        <input type="number" class="form-control" name="txtproducto" placeholder autofocus required
                        value="<?php echo $inv-> idProducto; ?>" >
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="ref" value="<?php echo $inv-> idInventario; ?>" >
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>


                </form>
            </div>
       </div>
    </div>
</div>

<?php include("footer_inv.php")   ?>    