<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>X-Men</title>
  <link rel="stylesheet" type="text/css" href="xmen1.css">
  <style>
    /* General */
    body {
      background-color: blue;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* Barra superior fija */
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
      margin: 20px auto;
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
  </style>
</head>
<body>
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

  <!-- Contenedor de datos -->
  <div class="datos">
    <?php
    echo "<table>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Nombre Real</th><th>Poderes</th><th>Primera Aparicion</th><th>Biografia</th></tr>";

    class TableRows extends RecursiveIteratorIterator {
      function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
      }

      function current() {
        return "<td style='border:1px solid red;'>" . parent::current() . "</td>";
      }

      function beginChildren() {
        echo "<tr>";
      }

      function endChildren() {
        echo "</tr>";
      }
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "xmen";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT id, nombre, nombrereal, poderes, primeraaparicion, bio FROM mutantes");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
      }
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo "</table>";
    ?>
  </div>
</body>
</html>
