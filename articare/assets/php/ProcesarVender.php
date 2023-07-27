<?php
session_start();
include('BDconexion.php');
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: /articare/index.html"); // Redirigir al inicio de sesión si no ha iniciado sesión
    exit();
}

// Función para generar un código aleatorio
function generarCodigoAleatorio($longitud = 8) {
    $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codigo = '';
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

// Generar un nuevo código aleatorio que no esté en la base de datos
do {
    $nuevoCodigo = generarCodigoAleatorio(); // Genera un código aleatorio
    $query = "SELECT COUNT(*) AS count FROM productos WHERE ProductoID = '$nuevoCodigo'";
    $result = mysqli_query($conectar, $query);
    $row = mysqli_fetch_assoc($result);
    $existe = $row['count'] > 0;
} while ($existe);

// Usar el nuevo código generado
$UsuarioID = $_SESSION['UsuarioID'];

if (isset($_FILES['Imagen'])) {
    $Imagen = $_FILES['Imagen']['name'];
    $Nombre = $_POST['Nombre'];
    $Precio = $_POST['Precio'];
    $Cantidad = $_POST['Cantidad'];
    $ruta_temporal = $_FILES['Imagen']['tmp_name'];

    // Guardar la foto en el servidor
    $carpeta_destino = "C:/xampp2/htdocs/articare/imagen/"; // Ruta de la carpeta de destino (asegúrate de que exista y tenga permisos de escritura)
    $ruta_destino = $carpeta_destino . $Imagen;
    
    if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
        // Guardar información en la base de datos
        $sql = "INSERT INTO productos (productoID, UsuarioID, Nombre, Precio, Cantidad, Imagen) 
                VALUES ('$nuevoCodigo', '$UsuarioID', '$Nombre', $Precio, $Cantidad, '$ruta_destino')";
        if ($conectar->query($sql) === true) {
            echo "El producto se agregó correctamente.";
            header("Location: /articare/index.html"); // Redirigir al índice después de agregar el producto
            exit();
        } else {
            echo "Error al agregar el producto en la base de datos: " . $conectar->error;
        }
    } else {
        echo "Error al subir la imagen al servidor.";
    }
}

header("Location: /articare/index.html"); // Redirigir al índice si no se ha enviado el formulario
exit();
?>
