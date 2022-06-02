
<?php
    include('lib/config.php');
    include('lib/db.php');
    include('carrito.php');
?>
    <!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Creaciones Blessed</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo_Carro.css?v=<?php echo time(); ?>" />
        <script src="/js/functions.js?v=<?php echo time(); ?>"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="icon" href="Img/Logo.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300&display=swap" rel="stylesheet">
        <script src="js/imgLiquid-min.js"></script>
    </head>
<body>
    <div class="padre">
        <header class="contenedortop">
            <nav class="contenedortop__nav">
                <a href="Index.php">Inicio</a>
                <a href="catalogo.php">Catalogo</a>
                <a href="#">Soporte</a>
                <a href="SobreNosotros.php">Sobre Nosotros</a>
                <a href="login.php"><i class="far fa-user"></i></a>
                <a href="#"><i class="fas fa-shopping-cart"></i> (<?php
                echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                ?>)</a>
             </nav>
    </div>
    </header>
    <main class="contenedorMid">
        <section class="contenedorMid__H2">
            <div class="contenedorMid__img">
                <div class="contenedorMid__img-f">
                   <section class="contenedorMid__img-c">
                    <h2>CARRITO DE COMPRAS</h2>
                    <h3>AQUI PODRAS ENCONTRAR TU LISTA DE PRODUCTOS</h3>
                   </section>
            </div>
        </section>
        
       <table class="table table-light table-bordered">
       <tbody>
         <tr>
            <th width="40%">Descripcion</th>
            <th width="15%">Cantidad</th>
            <th width="20%">Precio</th>
            <th width="20%">Total</th>
            <th width="5%">--</th>
         </tr>
         <?php $total=0; ?>
         <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
         <tr>
            <td width="40%"><?php echo $producto['NOMBRE']?></td>
            <td width="15%"><?php echo $producto['CANTIDAD']?></td>
            <td width="20%"><?php echo $producto['PRECIO']?></td>
            <td width="20%"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
            <td width="5%">
            <form action="" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
            <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
            </form>
            </td>
         </tr>
         <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>
         <?php } ?>
         <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">
                <form action="pagar.php" method="post">
                    <div class="alert alert-success">
                         <div class="form-froup">
                             <label for="my-input">Correo de contacto:</label>
                             <input for="email" name="email" placeholder="Por favor escriba su correo" 
                             class="form-control" type="email" required>
                         </div>
                         <small id="emailHelp">
                             Los productos se enviaran a este correo.
                         </small>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit" value="proceder" name="btnAccion">
                        Proceder a pagar >>
                    </button>
                </form>
            </td>
        </tr>
    </tbody>
        <?php if(!empty($_SESSION['CARRITO'])) {
        }else{?>
        <div class="alert alert-success">
            No hay productos en el carrito.....
        </div>
        <?php } ?>
    </main>
</body>
</html>