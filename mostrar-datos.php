<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar datos de la base de datos</title>
</head>
<body>
    <style>
        body{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: #F4D6CC;
            background-color: #32373B;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
        }
        h1{
            text-align: center;
            color: brown;
            margin-bottom: 20px;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            margin-top:50px;
            border-radius:50px;
        }
        th, td{
            padding: 10px;
            text-align:left;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even){
            background-color: #F4B860;
            color:black;
        }
        tr:nth-child(odd){
            background-color: #4A5859;
            color: #fff;
        }
        th{
            background-color: #C83E4D;
            color:white;
        }
    </style>
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
?>
    <div class="container">
        <h1>Datos del jugador de la NBA</h1>
       <?php
            if($resultado->num_rows >0){
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Apodo</th>
                    <th>Equipo</th>
                    <th>Posicion</th>
                    <th>Altura</th>
                    <th>Peso</th>
                    <th>Numero</th>
                    <th>Edad</th>
                    <th>Nacionalidad</th>
                    <th>Puntos</th>
                </tr> 
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['apodo']; ?></td>
                        <td><?php echo $fila['equipo']; ?></td>
                        <td><?php echo $fila['posicion']; ?></td>
                        <td><?php echo $fila['altura']; ?></td>
                        <td><?php echo $fila['peso']; ?></td>
                        <td><?php echo $fila['numero']; ?></td>
                        <td><?php echo $fila['edad']; ?></td>
                        <td><?php echo $fila['nacionalidad']; ?></td>
                        <td><?php echo $fila['puntos']; ?></td>
                    </tr>
                    <?php endwhile; ?>
            </table>};
            <?php else: ?>
                <p>No se encontraron jugadores</p>
                <?php endif; ?>
        
    </div>
    <a href="index.php">REGRESAR</a>
</body>
</html>