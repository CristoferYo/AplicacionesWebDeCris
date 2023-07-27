<?php

$host = "localhost";
$user = "root";
$clave = "";
$bd = "articare";

$conectar = mysqli_connect($host, $user, $clave, $bd);
if (!$conectar){
    echo "Error durante la conexión";
}
?>