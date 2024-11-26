<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Personajes de Marvel</title>
    <style>
        body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #1f1f1f;
    color: #FFFFFF;
    margin: 0;
}

.container {
    width: 80%;
    margin: auto;
}

h1 {
    color: #ff6600;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #f6a700;
}

th {
    background-color: #1f1f1f;
    color: #f6a700;
}

form {
    width: 50%;
    margin: auto;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #f6a700;
}

input[type="text"],
input[type="date"],
textarea {
    width: 60%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #f6a700;
    border-radius: 5px;
    background-color: #1f1f1f;
    color: yellow;
}

input[type="submit"] {
    background-color: #f6a700;
    color: #000;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="hidden"] {
    display: none;
}

#mensaje {
    margin-top: 15px;
    padding: 10px;
    border-radius: 5px;
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background: url('gambit.jpg') center/cover no-repeat;
    opacity: 0.3;
}
body::before{
            content:"";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: url('wolverine.jpg') center/cover no-repeat;
            opacity: 0.2;
        }

    </style>
</head>
<body>
    <h1>Personajes de Marvel</h1>

    <h2>Personajes</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Fecha de Creación</th>
            <th>Descripción</th>
            
            <th>Titulo del Comic</th>
            
            <th>Nombre del superpoder</th>

        </tr>

        <?php
        // Realizar la conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "notcomic";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    //verifica coneccion
    if($conn-> connect_error){
        die("La conexion a la base de datos fallo: " .$conn->connect_error);
    }

    //consulta mySQL para recuperar datos y relaciones
    $sql = "SELECT
    p.personajeID AS personajeID,
    p.nombre AS nombre,
    p.alias AS alias,
    p.fechadecreacion AS fechadecreacion,
    p.descripcion AS descripcion,
    c.comicID AS comicID,
    c.titulo AS titulo,
    s.superpoderID AS superpoderID,
    s.nombre AS nombre
    FROM personajes p
    LEFT JOIN personajecomic pc ON p.personajeID = pc.personajeID
    LEFT JOIN comics c on pc.comicID = c.comicID
    LEFT JOIN personajesuperpoder ps ON p.personajeID = ps.personajeID
    LEFT JOIN superpoderes s ON ps.superpoderID = s.superpoderID";

    $result = $conn->query($sql);

    if($result->num_rows >0){
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['personajeID'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['alias'] . "</td>";
            echo "<td>" . $row['fechadecreacion'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
          
            echo "<td>" . $row['titulo'] . "</td>";
            
            echo "<td>" . $row['nombre'] . "</td>";
            echo "</tr>";
        }
    }else{
        echo "<tr><td colspan='9'> No se encontraron personajes. </td></tr>";
    }
        $conn->close();
        ?>
        </table>
</body>
</html>


    
    