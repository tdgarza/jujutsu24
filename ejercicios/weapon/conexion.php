<?php
    
  $host = "localhost";
  $username = "root";
  $password = "";
  $basededatos ="xmen";
   

$conexion = mysqli_connect($host, $username, $password, $basededatos);
if($conexion->connect_errno > 0){
    die('Error: No es posible establecer la conexión: [' . $link->connect_error . ']');
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>