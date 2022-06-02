<!DOCTYPE html>
<html lang="es">
    <head>
    <?php
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
    ?>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Vista/estilo_Login.css?v=<?php echo(rand()); ?>" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="icon" href="Img/Logo.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300&display=swap" rel="stylesheet">
    </head>
<body>
<?php
   include("../Modelo/registro.php");
?>
  <div class="contenedorp">
      <div class="contenedorp_blur">
          <main class="login">
              <article class="login_logo" id="registro">
                  <i id="logoR"><img src="../Vista/Img/Logo.png" alt=""></i>
                  <h2>Crear Usuario</h2>
                  <form class="logo_formularios" id="#registroForm" method="POST">
                    <input type="text" name = "usuario" placeholder="     Usuario">
                    <br>
                    <input type="password" name = "password" placeholder="     Contraseña">
                    <br>
                    <input type="text" name = "nombre" placeholder="     Nombre">
                    <br>
                    <input type="text" name = "apellido" placeholder="     Apellido">
                    <br>
                    <input type="text" name = "telefono" placeholder="       Telefono">
                    <br>
                    <input type="text" name = "direccion" placeholder="      Direccion">
                    <br>
                    <input type="text" name = "NumeroDocumento" placeholder="      Numero Documento">
                    <br>
                    <input type="email" name = "correo" placeholder="      Correo">
                    <div class="logo_button">
                      <input type="submit" name = "registrar" value="Registrarse">
                    </div>
                  </form>
              </article>
              <form class="login_inicio" id="inicio" method="POST" action="../Modelo/validar.php">
                  <i id="logoI"><img src="../Vista/Img/Logo.png" alt=""></i>
                  <h2>INICIO DE SESION</h2>
                  <div class="inicio_texto">
                    <input type="text" placeholder="     Usuario" name="usuario">
                    <br>
                    <input type="password" placeholder="     Contraseña" name="contraseña">
                  </div>
                  <div class="inicio_botones">
                      <input type="submit" value="Login">
                  </div>
                  <a href="#" id="olvido">¿Te has olvidado de tu contraseña?</a>
              </article>
          </main>
      </div>
  </div>
</body>
<script>
    $(document).ready(function(){
      $("#registro").hover(function(){
        $("#registro").css({"height": "600px"});
        $("#registro").css({"transition-duration": "1.5s"});
        $(".login_inicio").css({"transition-duration": "1.5s"});
        $("#registro").css({"background-color": "#000"});
        $("#logoR").css({"display": "none"});
        $(".logo_formularios input").css({"display": "inline"});
        $(".logo_button").css({"display": "flex"});
        $("#logoI").css({"display": "inline"});
        $(".inicio_botones").css({"display": "none"});
        $(".inicio_texto").css({"display": "none"});
        $("#olvido").css({"display": "none"});
        $(".login_inicio").css({"height": "300px"});
        $(".login_inicio").css({"align-self": "center"});
        $(".login_inicio").css({"background-color": "#f75f5f"});
        $(".login_inicio h2").css({"padding": "-10px"});
        $(".login_inicio h2").css({"padding-top": "10px"});
      });
      $("#inicio").hover(function(){
        $("#registro").css({"background-color": "#f75f5f"});
        $("#registro").css({"transition-duration": "1.5s"});
        $(".login_inicio").css({"transition-duration": "1.5s"});
        $("#registro").css({"height": "300px"});
        $(".logo_formularios input").css({"display": "none"});
        $("#logoR").css({"display": "inline"});
        $(".logo_button").css({"display": "none"});
        $("#logoI").css({"display": "none"});
        $(".inicio_botones").css({"display": "inline"});
        $(".inicio_texto").css({"display": "inline"});
        $("#olvido").css({"display": "inline"});
        $(".login_inicio").css({"background-color": "#000"});
        $(".login_inicio").css({"height": "600px"});
        $(".login_inicio h2").css({"padding": "10px"});
        $(".login_inicio h2").css({"padding-top": "80px"});
      });
    });
    </script>
</html>
