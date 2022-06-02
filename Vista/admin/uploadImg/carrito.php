<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subir imagenes</title>
</head>
<body>
    <center>
        <form action="guardarprocess.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="nombre" placeholder="Nombre..." value=""/>
            <input type="file" name="imagen" >
            <input type="submit" value="subir imagen">
    </center>
    
</body>
</html>
