
<?php include 'modelo2/db_ped.php';
    $sentencia = $bd->query("SELECT * FROM producto p INNER JOIN clasificacion c 
    ON p.idClasificacion = c.idClasificacion");
    $producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $sentencia = $bd ->query("SELECT * FROM procesopedido");
    $pedido = $sentencia-> fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<html class="wide wow-animation" lang="en"> 
  <head>
    <title>Compra</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
<body>

<div class="p-3 mb-2 bg-dark text-white" role="alert">
        <div class="rounded"><a href="index.html"><img class="brand-logo-light" src="images/logo-default1-140x57.png" alt="" width="140" height="57" srcset="images/logo-default-280x113.png 2x"/></a></div>
        
</div>
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
            if(isset($_GET['mensaje']) and $_GET['mensaje'] =='errror'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> Error con la base de datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>
            <!-- fin alertas -->
<div class="card">
    <h2 class="text-center">Ingresar Datos para el pedido</h2>
    <div class="card-header">
     <form  class="p-4" method="POST" action="modelo2/reg_ped.php">
         <div class="mb-3">
             <label  class="form-label">Nombre del usuario</label>
            <input type="text" class="form-control" name="txtusuario" placeholder="Usuario" required>
         </div>
         <div class="mb-3">

            <div class="mb-3">
                <select class="form-select form-select-lg mb-3" name="txtproducto" id="">
                    <option value="">Seleccione un producto</option>
                    <?php
                    foreach($producto as $dato){
                    ?>
                 <option  value="<?php echo $dato->idProducto;?>"><?php echo $dato->NombreP;?></option>
                    <?php
                    }
                 ?>
                </select>
             </div> 
             <div class="mb-3">
                 <label for="form-label">Cantidad</label>
                    <input type="number" class="form-control" name="txtcantidad" placeholder="Cantidad" required>
             </div>
             <div class="mb-3">
                 <label for="form-label">Correo electronico</label>
                 <input type="email" class="form-control" name="txtcorreo" placeholder="Correo" required>
             </div>
             <div class="mb-3">
                 <label for="form-label">Telefono</label>
                <input type="number" class="form-control" name="txttelefono" placeholder="Telefono" required >
             </div>
             <div class="d-grib">
                 <input type="hidden" name="oculto" value="1">
                <input type="submit" class="btn btn-outline-success btn-lg" value="Registrar Pedido">
             </div>
     </form>
     
    </div>
</div>
</body>
</html>