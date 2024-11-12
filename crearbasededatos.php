<?php
$servername = "localhost";
$usuario = "root";
$password = "";

$basededatos = htmlspecialchars($_POST['nombre_de_base_datos']);

$conexion = new mysqli($servername, $usuario, $password, $basededatos);

if($conexion->connect_error){
    die("Conexion fallida: " . $conexion->connect_error);
    };

$sql = "CREATE DATABASE IF NOT EXISTS $basededatos";
if($conexion ->query($sql) === TRUE){
    echo "Base de datos '$basededatos' creada correctamente o ya existia.";
}else{
    die("Error al crear la base de datos: " . $conexion->error);
}
$conexion->select_db($basededatos);
$sql = "CREATE TABLE IF NOT EXISTS superheroes(
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    personaje VARCHAR(100) NOT NULL,
    comic VARCHAR(100) NOT NULL,
    habilidad VARCHAR(100) NOT NULL,
    equipo VARCHAR(100) NOT NULL,
    enemigo VARCHAR(100) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    especie VARCHAR(100) NOT NULL,
    universo VARCHAR(100) NOT NULL
)";
if($conexion ->query($sql) === TRUE){
    echo "Tabla de superheroes creada correctamente o ya existia.";
}else{
    die("Error al crear la tabla: " . $conexion->error);
}
$conexion ->close();
session_start();
$_SESSION['basededatos'] = $basededatos;
header("Location: final.php");
exit();
?>
