<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mutantes X-Men</title>
  <link rel="stylesheet" type="text/css" href="xmen1.css">
</head>
<body>
    <style>
   /* General */
body {
  background-color: blue;
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.titulo {
  font-size: 16px;
  color: #d853bb;
  text-align: center;
}

/* Barra de navegación */
.navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #333;
      padding: 10px 0;
      display: flex;
      justify-content: center;
      gap: 20px;
      z-index: 1000;
    }

.navbar a {
      color: yellow;
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
      background-color: red;
      padding: 10px 20px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .navbar a:hover {
      background-color: #ff6347; /* Tomate */
    }

 /* Logo centrado */
 .logo-container {
      margin-top: 100px; /* Espacio por la barra fija */
      display: flex;
      justify-content: center;
      align-items: center;
      flex-grow: 1;
    }

    .logo {
      width: 300px;
      max-width: 100%;
      height: auto;
      display: block;
      mix-blend-mode: multiply;
  
    }

/* Contenedor de datos */
.datos {
  width: 90%;
  max-width: 700px;
  margin: 50px auto;
  padding: 20px;
  background: white;
  border: 1px solid #ddd;
  border-radius: 10px;
  position: relative;
}

/* Tabla */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th, td {
  border: 1px solid red;
  text-align: left;
  padding: 8px;
}

th {
  background-color: yellow;
  color: black;
}

/* Estilo para botones */
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.button:hover {
  background-color: #45a049;
}

.personaje {
  background-color: red;
  border-radius: 15px;
  padding: 20px;
  color: black;
}

.nombre {
  background-color: yellow;
  text-align: center;
  font-size: 20px;
  margin: 10px auto;
  padding: 10px;
}

.foto {
  text-align: center;
}

.foto img {
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}

    </style>
 <!-- Barra de navegación fija -->
 <div class="navbar">
    <a href="./meterdatos.html">METER</a>
    <a href="./tabladepersonajes.php">DESPLEGAR</a>
    <a href="./personajes1.php">INICIO</a>
  </div>

  <!-- Logo centrado -->
  <div class="logo-container">
    <img class="logo" src="./xmenlogo.png" alt="Logo X-Men">
  </div>
  <!-- Formulario -->
  <div class="datos">
    <form action="personajes1.php" method="POST">
      <label for="id">ID DEL PERSONAJE:</label>
      <input type="text" name="id" id="id" required>
      <input type="submit" name="submit" id="submit" value="Ingresar">
    </form>

    <br>
    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $basededatos = "xmen";

    $conexion = mysqli_connect($host, $username, $password, $basededatos);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    if (isset($_POST['id'])) {
        $id = $conexion->real_escape_string($_POST['id']);
        $extraerdato = $conexion->query("SELECT * FROM mutantes WHERE id=$id");

        if ($extraerdato && $extraerdato->num_rows > 0) {
            $fetch = $extraerdato->fetch_assoc();

            $nombre = $fetch['nombre'];
            $nombrereal = $fetch['nombrereal'];
            $poderes = $fetch['poderes'];
            $primeraaparicion = $fetch['primeraaparicion'];
            $bio = $fetch['bio'];
            $imagen = $fetch['imagen'];
        } else {
            echo "<p>No se encontraron datos para el ID proporcionado.</p>";
        }
    }
    ?>
    
    <?php if (isset($fetch)): ?>
    <!-- Información del personaje -->
    <div class="personaje">
      <div class="nombre">Nombre Clave: <?php echo htmlspecialchars($nombre); ?></div>
      <div class="nombre">Nombre Real: <?php echo htmlspecialchars($nombrereal); ?></div>
      <div class="nombre">Poderes: <?php echo htmlspecialchars($poderes); ?></div>
      <div class="nombre">Primera Aparición: <?php echo htmlspecialchars($primeraaparicion); ?></div>
      <div class="nombre">Bio: <?php echo htmlspecialchars($bio); ?></div>
      <div class="foto">
        <img class="crop" src="data:image/jpeg;base64,<?php echo base64_encode($imagen); ?>" alt="Imagen del personaje">
      </div>
    </div>
    <?php endif; ?>

    <!-- Selección de categoría -->
    <form method="POST">
      <label for="nombre">Selecciona una categoría</label>
      <select name="nombre" id="nombre">
        <?php 
        $all_categories = $conexion->query("SELECT id, nombre FROM categorias");
        while ($category = mysqli_fetch_assoc($all_categories)) {
          echo "<option value='" . htmlspecialchars($category["id"]) . "'>" . htmlspecialchars($category["nombre"]) . "</option>";
        }
        ?>
      </select>
      <br>
      <input type="submit" value="Enviar" name="submit">
    </form>
  </div>
</body>
</html>
