<?php
    include('carrito.php');
    include('carro.php');
    include('catalogo.php');
?>

<?php
if($_POST){

    $total=0;
    $SID=session_id();
    $Correo="jhoan23425@hotmail.com";

    foreach($_SESSION['CARRITO'] as $indice=>$producto){
        $total=$total=($producto['PRECIO']*$producto['CANTIDAD']);
    }

    $sentencia=$pdo->prepare("INSERT INTO `pedidocabecera`
     (`idPedidoCabecera`, `ClaveTransaccional`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `Status`)
     VALUES (NULL, :ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente');");
     $sentencia->bindParam(":ClaveTransaccion",$SID);
     $sentencia->bindParam(":Correo",$Correo);
     $sentencia->bindParam(":Total",$total);
     $sentencia->execute();
    echo "<h3>".$total."</h3>";
}

?>