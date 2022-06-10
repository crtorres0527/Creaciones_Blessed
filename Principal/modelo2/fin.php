<?php include 'db_ped.php';
    $sentencia = $bd ->query("SELECT * FROM procesopedido");
    $pedido = $sentencia-> fetchAll(PDO::FETCH_OBJ);
    $sentencia2 = $bd ->query("SELECT * FROM procesopedido");
    $ultimo_id2= $sentencia2-> fetchAll(PDO::FETCH_OBJ);
    $ultimo_id = $ultimo_id2[count($ultimo_id2)-1];

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
        <div class="rounded"><a href="index.html"><img class="brand-logo-light" src="../images/logo-default1-140x57.png" alt="" width="140" height="57" srcset="images/logo-default-280x113.png 2x"/></a></div>
</div>
<?php
if(isset($_GET['mensaje']) and $_GET['mensaje'] =='exito'){
?>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Pedido Registrado</h4>
  <p>Tu pedido ha sido registrado, por favor anota la referencia:</p>
  <h2 class="text-center"><?php echo $ultimo_id->id; ?></h2>

 
  <hr>
  <p class="mb-0">Comunicate a este whatsapp:</p>
  <button type="button" class="btn btn-primary btn-sm"><a href="https://wa.link/x3cxxc" class="btn btn-primary stretched-link">Whatsapp</a></button>
  </hr>
</div>
<?php
  }
 ?>
 <div class="m-2 row justify-content-center">
          <div class="col-auto p-10 text-center"><a href="../index.php" class="btn btn-success btn-sm">Volver a inicio</a></div></div>
</body>
</html>