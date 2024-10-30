<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="yr_estilos.css">
    <title>Blog de Viajes</title>
</head>
<body>
    <header class="yr_encabezado">
        <h1>Bienvenido a nuestro Blog de Viajes</h1>
        <nav class="yr_nav">
            <a href="yr_index.php">Inicio</a>
            <a href="yr_viaje_brasil.php">Brasil</a>
            <a href="yr_viaje_argentina.php">Argentina</a>
        </nav>
    </header>
    <div class="opciones-viaje">
    <a href="yr_viaje_brasil.php">
        <div class="opcion">
            <h2>Viaje a Brasil</h2>
            <p>Explora los mejores destinos de Brasil.</p>
        </div>
    </a>
    <a href="yr_viaje_argentina.php">
        <div class="opcion">
            <h2>Viaje a Argentina</h2>
            <p>Descubre las maravillas de Argentina.</p>
        </div>
    </a>
</div>
    <!-- Sección de Comentarios -->
    <section class="yr_comentarios">
    <h2>Deja tu Comentario</h2>
    <form id="comentarioForm" action="yr_guardar_comentario.php" method="POST">
        <input type="text" name="nombre" placeholder="Tu nombre" required>
        <textarea name="comentario" placeholder="Escribe tu comentario aquí" required></textarea>
        <button type="submit">Enviar Comentario</button>
    </form>
    <!-- Espacio para mostrar el mensaje de éxito -->
    <p id="mensajeExito" style="display:none; color: green; font-weight: bold; text-align: center;">Comentario enviado con éxito</p>
    <!-- Mostrar Comentarios -->
    <h3>Comentarios</h3>
    <div class="comentarios-lista">
        <?php
        include 'yr_db.php';
        $sql = "SELECT nombre, comentario, fecha FROM yr_comentarios ORDER BY fecha DESC";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>{$row['nombre']}:</strong> {$row['comentario']} <em>({$row['fecha']})</em></p>";
        }
        ?>
    </div>
</section>
    <footer class="yr_footer">
        <p>Yonatan Ruloff</p>
    </footer>
 <!-- JavaScript para mostrar mensaje de éxito al enviar comentario -->
 <script>
        document.getElementById("comentarioForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Previene el envío normal del formulario

            // Realiza la solicitud de envío del formulario usando Fetch
            const formData = new FormData(this);
            fetch("yr_guardar_comentario.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Mostrar el mensaje de éxito
                document.getElementById("mensajeExito").style.display = "block";

                // Limpiar el formulario
                document.getElementById("comentarioForm").reset();

                // Opcional: Ocultar el mensaje después de unos segundos
                setTimeout(() => {
                    document.getElementById("mensajeExito").style.display = "none";
                }, 3000);
            })
            .catch(error => console.error("Error:", error));
        });
    </script>
</body>
</html>