<?php
include('BDconexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-18mE4kWBq781YhF1dvKuhfTAU6auU8tT94WrHftjDbrCEXSU10Boqy12QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style2.css">
    <title>ARTICARE</title>

</head>
<body>
    <img src="../img/ARTICARE.png" width="150px" alt="">
    <form action="./ProcesarVender.php" method="post" enctype="multipart/form-data">
        <h1>Creando Cuenta</h1>
        <hr>

        <!-- <label for="UsuarioID">ID del Usuario:</label> -->
        <!-- <input type="text" name="UsuarioID" value="UsuarioID"><br> -->

        <label for="Imagen">Imagen:</label>
        <input type="file" name="Imagen" placeholder="URL de la Imagen"><br>

        <label for="Nombre">Nombre:</label>
        <input type="text" name="Nombre" placeholder="Nombre del Producto"><br>

        <label for="Precio">Precio:</label>
        <input type="text" name="Precio" placeholder="Precio del Producto"><br>

        <label for="Cantidad">Cantidad:</label>
        <input type="text" name="Cantidad" placeholder="Cantidad Disponible"><br>

        <hr>
        <button type="submit">Subir</button>
        <a href="/articare/index.html">Regresar</a>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-RZk6zfw8L2nq7Ev3DMKNGvxBTWNzqLMWxIV2ILO4avtr8QusnRENS/5Dk9AeOrw0" crossorigin="anonymous"></script>
</body>
</html>