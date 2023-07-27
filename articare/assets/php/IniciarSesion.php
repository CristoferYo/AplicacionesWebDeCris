<?php
session_start();
include('BDconexion.php');

if(isset($_POST['NombreUsuario']) && isset($_POST['Contraseña'])){
    function validar($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $NombreUsuario = validar($_POST['NombreUsuario']);
    $Contraseña = validar($_POST['Contraseña']);

    if(empty($NombreUsuario)){
        header("Location: ./InterfazArticare.php?error=Ingrese un nombre de usuario");
        exit();
    }
    elseif(empty($Contraseña)){
        header("Location: ./InterfazArticare.php?error=Ingrese una contraseña");
        exit();
    }
    else{
        //$Contraseña = md5($Contraseña);

        $sql = "SELECT * FROM  usuarios WHERE NombreUsuario = '$NombreUsuario' AND Contraseña = '$Contraseña'";
        $result = mysqli_query($conectar, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['NombreUsuario'] === $NombreUsuario && $row['Contraseña'] === $Contraseña){
                $_SESSION['UsuarioID'] = $row['UsuarioID'];
                $_SESSION['NombreUsuario'] = $row['NombreUsuario'];
                $_SESSION['Contraseña'] = $row['Contraseña'];
                $_SESSION['Nombres'] = $row['Nombres'];
                $_SESSION['Apellidos'] = $row['Apellidos'];
                $_SESSION['CorreoElectronico'] = $row['CorreoElectronico'];
                $_SESSION['FechaRegistro'] = $row['FechaRegistro'];
                header("Location: /articare/index.html");
                exit();
            }
            else{
                header("Location: ./InterfazArticare.php?error=Contraseña incorrecta");
                exit();
            }
        }
        else{
            header("Location: ./InterfazArticare.php?error=Nombre de usuario o contraseña incorrectos");
            exit();
        }
    }
}
else{
    header("Location: /articare/index.html");
    exit();
}
?>
