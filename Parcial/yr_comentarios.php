<?php
session_start();
include 'yr_db.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: yr_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['id_usuario'];
    $comentario = $_POST['comentario'];

    $sql = "INSERT INTO yr_comentarios (id_usuario, comentario) VALUES ('$id_usuario', '$comentario')";
    $conn->query($sql);
}
?>

<form method="POST">
    <textarea name="comentario" required></textarea>
    <button type="submit">Enviar Comentario</button>
</form>

<h2>Comentarios</h2>
<?php
$sql = "SELECT u.correo, c.comentario, c.fecha FROM yr_comentarios c JOIN yr_usuarios u ON c.id_usuario = u.id ORDER BY c.fecha DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<p><strong>{$row['correo']}:</strong> {$row['comentario']} <em>({$row['fecha']})</em></p>";
}
?>
