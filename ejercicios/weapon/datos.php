<!DOCTYPE html>
		<html>
		<head>
			<title>X-Men</title>
		</head>
		<link rel="stylesheet" type="text/css" href="./xmen.css">
		<body class="fondo">
			<img class="logo" src="./xmenlogo.png" >
			<div class="linea">
			<div class="titulo">
			
</div>
			</div>

<?php
	if(isset($_POST["submit"]))
	{
	$filename = ($_FILES["imagen"]["name"]);
	$tempname = ($_FILES["imagen"]["tmp_name"]);    
	$folder = $_SERVER['DOCUMENT_ROOT'].'/xmen/image/' .$filename;
	$imgContenido = addslashes(file_get_contents($tempname));
	move_uploaded_file($tempname, $folder.$filename);
	

	echo $filename  .$tempname . $folder;
	
	$nombre = $_POST['nombre'];
	$nombrereal = $_POST['nombrereal'];
	$poderes = $_POST['poderes'];
	$primeraaparicion = $_POST['primeraaparicion'];
	$bio=$_POST['bio'];

	echo $nombre;

	$host = "localhost"; 
	$username = "root";
	$password = "";
	$basededatos ="xmen";

	$conexion = mysqli_connect($host, $username, $password, $basededatos);
		if (!$conexion) {
			die("Error de conexion" . mysqli_connect_error());
			}

	
	$sql = "INSERT INTO mutantes (id, nombre, nombrereal, poderes, 
	primeraaparicion, bio, imagen) VALUES ('0','$nombre', '$nombrereal', 
	'$poderes', '$primeraaparicion', '$bio', '$imgContenido')";
	
	$rs = mysqli_query($conexion, $sql);
	if ($rs) {
		echo "El registro ha sigo anexado";
		}
	mysqli_close($conexion);
	}

	?>

</body>
</html>
