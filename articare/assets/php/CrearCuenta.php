<?php
include('BDconexion.php');

$NombreUsuario = $_POST['NombreUsuario'];
$Contraseña = $_POST['Contraseña'];
$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$CorreoElectronico = $_POST['CorreoElectronico'];
$FechaRegistro = $_POST['FechaRegistro'];


if (empty($NombreUsuario) || empty($Contraseña) || empty($Nombres) || empty($Apellidos ) || empty($CorreoElectronico)) {
    header("Location: ./CrearCuentaInterfaz.php?error=Ingrese un nombre de usuario y una contraseña");
    exit();
}
// Función para generar un nuevo ID autoincremental único
function generarNuevoID($conectar) {
    $query = "SELECT MAX(UsuarioID) AS max_id FROM usuarios";
    $result = mysqli_query($conectar, $query);
    $row = mysqli_fetch_assoc($result);
    $ultimoID = $row['max_id'];
    $nuevoID = $ultimoID + 1;

    // Verificar si el nuevo ID ya existe en la base de datos
    $query_check = "SELECT COUNT(*) AS count FROM usuarios WHERE UsuarioID = $nuevoID";
    $result_check = mysqli_query($conectar, $query_check);
    $row_check = mysqli_fetch_assoc($result_check);
    $count = $row_check['count'];

    // Si el nuevo ID ya existe, generar uno nuevo recursivamente
    if ($count > 0) {
        return generarNuevoID($conectar);
    }

    return $nuevoID;
}

// Validar que el CorreoElectronico no exista en la base de datos
$query_check_correo = "SELECT COUNT(*) AS count FROM usuarios WHERE CorreoElectronico = '$CorreoElectronico'";
$result_check_correo = mysqli_query($conectar, $query_check_correo);
$row_check_correo = mysqli_fetch_assoc($result_check_correo);
$count_correo = $row_check_correo['count'];

// Si el CorreoElectronico ya existe, mostrar mensaje de error y redireccionar
if ($count_correo > 0) {
    header("Location: ./CrearCuentaInterfaz.php?error=El correo electrónico ya está registrado.");
    exit();
}

// Generar el nuevo ID autoincremental único
$UsuarioID = generarNuevoID($conectar);

// Validar que el NombreUsuario no exista en la base de datos
$query_check_usuario = "SELECT COUNT(*) AS count FROM usuarios WHERE NombreUsuario = '$NombreUsuario'";
$result_check_usuario = mysqli_query($conectar, $query_check_usuario);
$row_check_usuario = mysqli_fetch_assoc($result_check_usuario);
$count_usuario = $row_check_usuario['count'];

// Si el NombreUsuario ya existe, mostrar mensaje de error y redireccionar
if ($count_usuario > 0) {
    header("Location: ./CrearCuentaInterfaz.php?error=El nombre de usuario ya está registrado.");
    exit();
}

// Insertar el nuevo registro en la base de datos
$insertar = "INSERT INTO usuarios (UsuarioID, NombreUsuario, Contraseña, Nombres, Apellidos, CorreoElectronico, FechaRegistro) VALUES ('$UsuarioID', '$NombreUsuario', '$Contraseña', '$Nombres', '$Apellidos', '$CorreoElectronico', '$FechaRegistro')";
$query = mysqli_query($conectar, $insertar);

header("Location: /articare/index.html");
exit();
?>
