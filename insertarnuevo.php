<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "torresgemelas";

    $conexion = new mysqli($servername, $username, $password, $databasename);

    if($conexion->connect_error){
        die("La conexion a la base de datos fallo: " . $conexion->connect_error);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $apodo = $_POST["apodo"];
        $equipo = $_POST["equipo"];
        $posicion = $_POST["posicion"];
        $altura = $_POST["altura"];
        $peso = $_POST["peso"];
        $numero = $_POST["numero"];
        $edad = $_POST["edad"];
        $nacionalidad = $_POST["nacionalidad"];
        $puntos = $_POST["puntos"];

        $sql = "INSERT INTO jugadores (nombre, apodo, equipo, posicion, altura, peso, numero, edad, nacionalidad, puntos) VALUES ('$nombre','$apodo','$equipo','$posicion','$altura','$peso','$numero','$edad','$nacionalidad', '$puntos')";

        if($conexion->query($sql)===TRUE){
            echo "Nuevo jugador agregado con exito.";
        }else{
            echo "Error al agregar la persona: " . $conexion->error;
        }
    }
?>