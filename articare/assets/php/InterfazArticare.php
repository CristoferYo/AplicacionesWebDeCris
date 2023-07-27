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
     <a href="/articare/index.html" class="back-link">Regresar</a>
     <img  src="assets/img/ARTICARE.png" width="150px">
    <form action="./IniciarSesion.php" method="post">
        <h1>Iniciar Sesión</h1>
        <hr>

        <?php
        if(isset($_GET['error'])){
            ?>
            <p class="error">
                <?php
                echo $_GET['error']
                ?>
            </p>
        <?php
        }
        ?>

        <i class="fa-solid fa-user"></i>
        <label for="">Usuario:</label>
        <input type="text" name="NombreUsuario" placeholder="Nombre de usuario"><br>
        <i class="fa-solid fa-lock"></i> 
        <label for="">Contraseña:</label>
        <input type="password" required name="Contraseña" placeholder="Contraseña">
        <hr>
        <a href="./CrearCuentaInterfaz.php">Crear Cuenta</a>
        <button type="submit">Entrar</button>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-RZk6zfw8L2nq7Ev3DMKNGvxBTWNzqLMWxIV2ILO4avtr8QusnRENS/5Dk9AeOrw0" crossorigin="anonymous"></script>
</body>
</html>
