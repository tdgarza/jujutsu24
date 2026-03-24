<?php
if(isset($_POST["submit"]))
{
    $filename = ($_FILES["image"]["name"]);
    $tempname = ($_FILES["image"]["tmp_name"]);
    $folder = $_SERVER['DOCUMENT_ROOT'].'/jujutsu24/image/' .$filename;
    $imgContenido = addslashes(file_get_contents($tempname));
    move_uploaded_file($tempname, $folder.$filename);

    echo $filename . $tempname . $folder;

    $nombre = $_POST['nombre'];
    $nombrereal = $_POST['nombrereal'];
    $poderes = $_POST['poderes'];
    $primeraaparicion = $_POST['primeraaparicion'];
    $bio = $_POST['bio'];

    echo $nombre;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "xmen";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn-> connect_error){
        die("La conexion a la base de datos fallo: " .$conn->connect_error);
        }
    $sql = "INSERT INTO mutantes (id, nombre, nombrereal, poderes, primeraaparicion, bio, imagen) VALUES ('0', '$nombre', '$nombrereal', '$poderes', '$primeraaparicion', '$bio', '$imgContenido')"; 

    $rs = mysqli_query($conexion, $sql);
	if ($rs) {
		echo "El registro ha sigo anexado";
		}
	mysqli_close($conexion);
	}

	
    

}

?>