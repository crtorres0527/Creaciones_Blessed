
<?php
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case '    Agregar Al Carrito':

            if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="OK ID CORRECTO ".$ID."<br/>";
            }else{
                $mensaje.="Upss... ID Incorrecto"."<br/>";
            }
            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="OK NOMBRE CORRECTO ".$NOMBRE."<br/>";
            }else{
                $mensaje.="Upps... algo pasa con el nombre"."<br/>";
            }
            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="Ok CANTIDAD CORRECTA ".$CANTIDAD."<br/>";
            }else{
                $mensaje.="Upps... algo pasa con la cantidad"."<br/>";
            }
            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="Ok PRECIO CORRECTO ".$PRECIO."<br/>";
            }else{
                $mensaje.="Upps... algo pasa con el precio"."<br/>";
            }

            if(!isset($_SESSION['CARRITO'])){
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITO'][0]=$producto;
            }else{
                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );

                $_SESSION['CARRITO'][$NumeroProductos]=$producto;
            }
            //$mensaje= print_r($_SESSION,true);
            $mensaje= "Producto agregado al carrito";

        break;
        case "Eliminar";
        if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){
            $ID=openssl_decrypt($_POST['id'],COD,KEY);
            foreach($_SESSION['CARRITO'] as $indice=>$producto){
                if($producto['ID']==$ID){
                    unset($_SESSION['CARRITO'][$indice]);
                    echo "<script>alert('Elemento Borrado');</script>";
                }
            }
        }else{
            $mensaje.="Upss... ID Incorrecto"."<br/>";
        }
        break;
    }
}

?>
