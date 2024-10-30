<?php
include 'yr_db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM yr_usuarios WHERE correo='$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($contraseña, $user['contraseña'])) {
            $_SESSION['id_usuario'] = $user['id'];
            header("Location: yr_index.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

<form method="POST">
    Correo: <input type="email" name="correo" required>
    Contraseña: <input type="password" name="contraseña" required>
    <button type="submit">Iniciar Sesión</button>
</form>
