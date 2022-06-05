<?php include '../Vista/admin/producto/db_pro.php';
    $sentencia = $bd->query("SELECT * FROM producto p INNER JOIN clasificacion c ON p.idClasificacion = c.idClasificacion");
    $producto= $sentencia->fetchAll(PDO::FETCH_OBJ);
    $sentencia2 = $bd->query("SELECT * FROM clasificacion");
    $clasificacion= $sentencia2->fetchAll(PDO::FETCH_OBJ);
    //print_r($producto);

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

<select class="form-select" aria-label="Default select example">
  <option> seleccione el producto </option>
  <option value="1"><?php echo $sentencia ->NombreP; ?></option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>

</body>
</html>