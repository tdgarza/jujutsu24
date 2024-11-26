<?php
    $username = "root";
    $password = "";
    $servername = "localhost";
    $database = "notcomic";
   
    $conexion = new mysqli($servername, $username, $password, $database);

    if($conexion->connect_error){
    die("Conexion fallida: " . $conexion->connect_error);
    }
    //son los datos del formulario de la pagina de captura
    $nombre = htmlspecialchars($_POST['nombre']);
    $alias = htmlspecialchars($_POST['alias']);
    $fechadecreacion = htmlspecialchars($_POST['fechadecreacion']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $comics = htmlspecialchars($_POST['comics']);
    $superpoderes = htmlspecialchars($_POST['superpoderes']);

    //aqui agrego los valores a la tabla de personajes
    $sql_personaje = "INSERT INTO personajes (nombre, alias, fechadecreacion, descripcion) VALUES (?,?,?,?)";
    $stmt = $conexion->prepare($sql_personaje);
    $stmt->bind_param("ssss", $nombre, $alias, $fecha, $fechadecreacion, $descripcion);
    $stmt->execute();
    $personaje_id = $stmt->insert_id;
    $stmt->close();

    foreach($comics as $comics_titulo){
        $comic_titulo = trim($comic_titulo);

        //con esto se verifica si el comic ya existe en la base de datos
        $sql_comic="SELECT comicID FROM comics WHERE titulo = ?";
        $stmt = $conexion->prepare($sql_comic);
        $stmt->bind_param("s", $comic_titulo);
        $stmt->execute();
        $result =$stmt->get_result();

        if($result->num_rows >0){
            $comic_id = $result->fetch_assoc()['comicID'];
        }else{
            //con esta parte pondre el comic si si no existe
            $sql_insert_comic = "INSERT INTO comics (titulo) VALUES (?)";
            $stmt_insert = $conexion->prepare($sql_insert_comic);
            $stmt_insert->bind_param("s", $comic_titulo);
            $stmt_insert->execute();
            $comic_id = $stmt_insert->insert_id;
            $stmt_insert->close();
        }
    }
        foreach($superpoderes as $superpoder_nombre){
            $superpoder_nombre = trim($superpoder_nombre);
            //con esto se verifica si el superpoder ya existe en la base de datos
            $sql_superpoder="SELECT superpoderID FROM superpoderes WHERE nombre = ?";
            $stmt = $conexion->prepare($sql_superpoder);
            $stmt->bind_param("s", $superpoder_nombre);
            $stmt->execute();
            $result =$stmt->get_result();
    
            if($result->num_rows >0){
                $superpoder_id = $result->fetch_assoc()['superpoderID'];
            }else{
                //con esta parte pondre el comic si si no existe
                $sql_insert_superpoder = "INSERT INTO superpoderes (nombre) VALUES (?)";
                $stmt_insert = $conexion->prepare($sql_superpoder);
                $stmt_insert->bind_param("s", $superpoder_nombre);
                $stmt_insert->execute();
                $superpoder_id = $stmt_insert->insert_id;
                $stmt_insert->close();
            }
            //con esta parte, relaciono el personaje con el superpoder
            $sql_personaje_superpoder = "INSERT INTO personajesuperpoder (personajeID, superpoderID) VALUES (?,?)";
            $stmt_relacion = $conexion->prepare($sql_personaje_superpoder);
            $stmt_relacion->bind_param("ii", $personaje_id, $superpoder_id);
            $stmt_relacion->execute();
            $stmt_insert->close();
    }
    //cerrar la conexion (esto siempre va)
    $conexion->close();
    //redireccionar a la pagina de personajes, aqui es donde quieran, si quieren dirigirla a la de volver a capturar o redirigirla a mostrar datos
    header("Location: relaciones.php");
    exit();
    ?>
