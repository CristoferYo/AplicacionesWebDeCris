<?php
include("BDconexion.php");

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
    <script>
        function mostrarFechaActual() {
            var fecha = new Date(); // Obtener la fecha actual
            var campoFecha = document.getElementById("FechaRegistro");
            var dia = fecha.getDate();
            var mes = fecha.getMonth() + 1; // Los meses en JavaScript se cuentan desde 0 (enero = 0)
            var año = fecha.getFullYear();

            // Formatear la fecha como "YYYY-MM-DD"
            var fechaFormateada = año + "-" + (mes < 10 ? "0" + mes : mes) + "-" + (dia < 10 ? "0" + dia : dia);

            campoFecha.value = fechaFormateada; // Insertar la fecha en el campo de formulario
        }
    </script>
</head>
<body onload="mostrarFechaActual()">
    <img src="../img/ARTICARE.png" width="150px" alt="">
    <form action="./CrearCuenta.php" method="post">
        <h1>Creando Cuenta</h1>
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
        <label for="">Usuario:</label>
        <input type="text" name="NombreUsuario" placeholder="Nombre de usuario"><br>
        <label for="">Contraseña:</label>
        <input type="password" name="Contraseña" placeholder="Contraseña">
        <label for="">Nombres:</label>
        <input type="text" name="Nombres" placeholder="Nombres"><br> 
        <label for="">Apellidos:</label>
        <input type="text" name="Apellidos" placeholder="Apellidos">
        <label for="">Correo Electronico:</label>
        <input type="text" name="CorreoElectronico" placeholder="Correo Electrionico">
        <!--<label for="fecha">Fecha de registro:</label>-->
        <input type="Hidden"  id="FechaRegistro" name="FechaRegistro" readonly>
        <hr>
        <button type="submit">Crear</button>
        <a href="/articare/index.html">Regresar</a>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-RZk6zfw8L2nq7Ev3DMKNGvxBTWNzqLMWxIV2ILO4avtr8QusnRENS/5Dk9AeOrw0" crossorigin="anonymous"></script>
</body>
</html>