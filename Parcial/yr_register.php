<?php
include 'yr_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO yr_usuarios (correo, contraseña) VALUES ('$correo', '$contraseña')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    Correo: <input type="email" name="correo" required>
    Contraseña: <input type="password" name="contraseña" required>
    <button type="submit">Registrarse</button>
</form>
