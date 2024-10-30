<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "yonatanruloff10";
$bd = "yr_blog_viajes";

$conn = new mysqli($servidor, $usuario, $contraseña, $bd);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
