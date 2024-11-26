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
<a aria-label='Thanks' class='h-button centered' data-text='METER' style="left: 280px; top: 400px;" href='./xmendatos.html'>
  <span>M</span>
  <span>U</span>
  <span>T</span>
  <span>A</span>
  <span>N</span>
  <span>T</span>
</a>
	<a aria-label='Thanks' class='h-button centered' style="left: 100px;  top: 400px;" data-text='DESPLEGAR' href='./weaponxx.php'>
  <span>M</span>
  <span>U</span>
  <span>T</span>
  <span>A</span>
  <span>N</span>
  <span>T</span>
</a>	
	<a aria-label='Thanks' class='h-button centered' style="left: 460px;  top: 400px;" data-text='BIOGRAFIA' href='./abril1.php'>  <span>M</span>
  <span>U</span>
  <span>T</span>
  <span>A</span>
  <span>N</span>
  <span>T</span>
</a>
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

	
	$sql = "INSERT INTO equipoazul (id, nombre, nombrereal, poderes, 
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
