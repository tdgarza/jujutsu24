puedes corregirme esto, este es el codigo:
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel</title>
</head>
<body>
    <style>
        table{
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th{
            background-color: #f2f2;
        }
        h1{
            text-align: center;
        }
    </style>
    <h1>Personajes de Marvel</h1>
    <h2>Personajes</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Fecha de Creacion</th>
            <th>Descripcion</th>
            <th>Comics</th>
            <th>Superpoderes</th>
        </tr>
    </table>
    <?php

     // Configuración de la conexión a la base de datos
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "marvel616";
 
     // Crear conexión
     $conn = new mysqli($servername, $username, $password, $dbname);
 
     // Verificar la conexión
     if ($conn->connect_error) {
         die("La conexión a la base de datos falló: " . $conn->connect_error);
     }
     $sql= "SELECT 
                p.personajeID AS personajeID, 
                p.nombre AS nombredelsuperheroe, 
                p.alias AS alias, 
                p.fechadecreacion AS fechadecreacion, 
                p.descripción AS descripcion, 
                GROUP_CONCAT(c.titulo) AS Comics,
                GROUP_CONCAT(s.nombre) AS Superpoderes
            FROM Personajes p
            LEFT JOIN PersonajeComic pc ON p.personajeID = pc.personajeID
            LEFT JOIN Comics c ON pc.comicID = c.comicID
            LEFT JOIN PersonajeSuperpoder ps OF p.personajeID = ps.personajeID
            LEFT JOIN Superpoderes s ON ps.superpoderID = s.superpoderID
            GROUP BY p.personajeID";
    //Realizar la consulta
    $result = $conn->query($sql);
    if ($result->num_rows >0) {
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['personajeID'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['alias'] . "</td>";
            echo "<td>" . $row['fechadecreacion'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['comics'] . "</td>";
            echo "<td>" . $row['superpoderes'] . "</td>";
            echo "</tr>";
        }
    }else{
        echo "<tr><td colspan='6'>No se encontraron personajes.</td></tr>";
    }
    //Cierro la conexion
    $conn->close();
    ?>
    </table>
</body>
</html>
