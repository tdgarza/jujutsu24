<?php
// Parámetros de conexión a la base de datos
$host = "localhost";    // Cambia si es necesario
$usuario = "root";      // Usuario de la base de datos
$password = "";         // Contraseña del usuario
$base_de_datos = "mi_base_de_datos";  // Nombre de la base de datos

// Crear la conexión a la base de datos
$conexion = new mysqli($host, $usuario, $password, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta SQL para seleccionar todos los personajes de la tabla
$sql = "SELECT * FROM personajes_anime";
$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    echo "<div class='container'>";
    echo "<h1>Lista de Personajes de Anime</h1>";
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Anime</th>
            <th>Edad</th>
            <th>Género</th>
            <th>Habilidad</th>
            <th>Estatura (cm)</th>
            <th>Peso (kg)</th>
            <th>Equipo</th>
            <th>Alianza</th>
            <th>Estado</th>
          </tr>";

    // Mostrar los datos en una tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['nombre']}</td>
                <td>{$fila['anime']}</td>
                <td>{$fila['edad']}</td>
                <td>{$fila['genero']}</td>
                <td>{$fila['habilidad']}</td>
                <td>{$fila['estatura']}</td>
                <td>{$fila['peso']}</td>
                <td>{$fila['equipo']}</td>
                <td>{$fila['alianza']}</td>
                <td>{$fila['estado']}</td>
              </tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "No se encontraron personajes.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
