<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgb(108, 136, 241)
        }
        h1{
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            text-shadow: 0 2px 0px pink;
        }
        label{
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }
        input{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            width: 100%;
            color: red;
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
    //obtencion de los datos del formulario
    $nombre = $_POST['nombre'];
    $apodo = $_POST['apodo'];
    $equipo = $_POST['equipo'];
    $posicion = $_POST['posicion'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $numero = $_POST['numero'];
    $edad = $_POST['edad'];
    $nacionalidad = $_POST['nacionalidad'];
    $puntos = $_POST['puntos'];
    
    $sql = "INSERT INTO jugadores (nombre, apodo, equipo, posicion, altura, peso, numero, edad, nacionalidad, puntos) VALUES ('$nombre','$apodo','$equipo','$posicion','$altura','$peso','$numero','$edad','$nacionalidad', '$puntos')";
    if($conexion->query($sql) === TRUE){
        echo "Datos guardados satisfactoriamente";
    }else{
        echo "ERROR: " . $sql . "<br>" . $conexion->error;
    }
    $conexion->close();
    ?>
    <div class="container">
        <h1>Introducir los jugadores de la NBA</h1>
        <form action="guardar-datos.php" method="post">
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="apodo">Apodo: </label>
            <input type="text" id="apodo" name="apodo" required>
            <label for="equipo">Equipo: </label>
            <input type="text" id="equipo" name="equipo" required>
            <label for="posicion">Posicion: </label>
            <input type="text" id="posicion" name="posicion" required>
            <label for="altura">Altura: </label>
            <input type="text" id="altura" name="altura" required>
            <label for="peso">Peso: </label>
            <input type="text" id="peso" name="peso" required>
            <label for="numero">Numero: </label>
            <input type="number" id="numero" name="numero" required>
            <label for="edad">Edad: </label>
            <input type="number" id="edad" name="edad" required>
            <label for="nacionalidad">Nacionalidad: </label>
            <input type="text" id="nacionalidad" name="nacionalidad" required>
            <label for="puntos">Punto: </label>
            <input type="text" id="puntos" name="puntos" required>

            <div class="button">
                <button type="submit">Guardar</button>
                <button type="reset">Limpiar</button>
            </div>

        </form>

    </div>
</body>
</html>