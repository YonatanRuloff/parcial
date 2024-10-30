<?php
include 'yr_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $comentario = $_POST['comentario'];

    // Insertar comentario en la base de datos
    $sql = "INSERT INTO yr_comentarios (nombre, comentario) VALUES ('$nombre', '$comentario')";

    if ($conn->query($sql) === TRUE) {
        header("Location: yr_index.php"); // Redirige de nuevo al index después de enviar el comentario
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
