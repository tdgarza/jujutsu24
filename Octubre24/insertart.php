<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
       :root{
    --oxford-blue: #0a2342ff;
    --zomp: #2ca58dff;
    --cambridge-blue: #84bc9cff;
    --baby-powder: #fffdf7ff;
    --cyclamen: #f46197ff;
     }
    body {
      font-family: Arial, sans-serif;
      background-color: var(--baby-powder);
      color: #f5f5f5;
      display: flex;
      justify-content: center;
      padding: 20px;
    }
    h1{
        color: var(--oxford-blue);
        text-shadow: 2px 2px 6px black;
        margin-bottom: 20px;
        font-size: 35px;
    }
    
form {
    background-color: #ffffff;
    padding: 25px 35px;
    border-radius: 15px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    width: 320px;
    display: flex;
    flex-direction: column;
}

/* ====== Etiquetas ====== */
label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #444;
}

/* ====== Entradas ====== */
input[type="text"] {
    padding: 10px;
    margin-bottom: 15px;
    border: 2px solid #ddd;
    border-radius: 8px;
    transition: border-color 0.3s;
    font-size: 1em;
}

/* Efecto al enfocar */
input[type="text"]:focus {
    outline: none;
    border-color: #4facfe;
}

/* ====== Botón ====== */
input[type="submit"] {
    background-color: #4facfe;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    font-size: 1em;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}

/* Efecto hover */
input[type="submit"]:hover {
    background-color: #00c6ff;
    transform: translateY(-2px);
}

/* ====== Mensajes PHP ====== */
p, .mensaje {
    margin-top: 20px;
    color: white;
    font-weight: bold;
    background: rgba(0,0,0,0.3);
    padding: 10px 20px;
    border-radius: 10px;
}

    </style>
    <h1>INSERTAR DATOS</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="formulario">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido" required>
        <label for="nacimiento">Nacimiento: </label>
        <input type="text" id="nacimiento" name="nacimiento" required>
        <label for="especialidad">Especialidad: </label>
        <input type="text" id="especialidad" name="especialidad" required>

        <input type="submit" value="Agregar Registro">

    </form>
    <?php
 // Configuración de la conexión a la base de datos
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "tomasgarzam";
 
     // Crear conexión
     $conn = new mysqli($servername, $username, $password, $dbname);
 
     // Verificar la conexión
     if ($conn->connect_error) {
         die("La conexión a la base de datos falló: " . $conn->connect_error);
     }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados desde el formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nacimiento = $_POST["nacimiento"];
    $especialidad = $_POST["especialidad"];
 
    // Consulta SQL para insertar una nueva persona en la tabla
    $sql = "INSERT INTO axlrose (nombre, apellido, nacimiento, especialidad) VALUES ('$nombre', '$apellido', '$nacimiento', '$especialidad')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Nueva persona agregada con éxito.";
    } else {
        echo "Error al agregar la persona: " . $conn->error;
    }
}
?>
</body>
</html>