<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar datos</title>
</head>
<body>
    <h1>Mostrar datos</h1>
    <?php
    $username = "root";
    $password = "";
    $servername = "localhost";
    $database = "torresgemelas";
    //crear conexion
    $conexion = new mysqli($servername, $username, $password, $database);
    //Verificar la conexion
    if($conexion->connect_error){
        die("Conexion fallida: " . $conexion->connect_error);
        }
    $sql = "SELECT * FROM jugadores";
    $resultado = $conexion->query($sql);

    if($resultado->num_rows >0){
        echo "<table>";
        echo "<tr><th>Id</th><th>Nombre</th><th>Apodo</th><th>Equipo</th><th>Posicion</th><th>Altura</th><th>Peso</th><th>Numero</th><th>Edad</th><th>Nacionalidad</th><th>Puntos</th></tr>";
        while($row = $resultado->fetch_assoc()){
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["apodo"] . "</td><td>" . $row["equipo"] ."</td><td>" . $row["posicion"] . "</td><td>" . $row["altura"] . "</td><td>" . $row["peso"] . "</td><td>" . $row["numero"] . "</td><td>" . $row["edad"] . "</td><td>" . $row["nacionalidad"] . "</td><td>" . $row["puntos"] . "</td></tr>";
        }
        echo "</table>";
        }else{
        echo "No se encontraron registros en la base de datos";
        }
        $conexion->close();
    ?>
</body>
</html>