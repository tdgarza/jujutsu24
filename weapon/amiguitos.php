<?php
    if(isset($_POST['submit']))
    {
        $nombre = $_POST['nombre'];
        $estatura = $_POST['estatura'];
        $hobby = $_POST['hobby'];
        $id_color=$_POST['id_color'];
        $id_sexo=$_POST['id_sexo'];
        $id_mascota=$_POST['id_mascota'];
        
        //database details. You have created these details in the third step. Use your own.
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "amigos";

        //create connection
        $con = mysqli_connect($host, $username, $password, $dbname);
        //check connection if it is working or not
        if (!$con)
        {
            die("Connection failed!" . mysqli_connect_error());
        }
        //This below line is a code to Send form entries to database
        $sql = "INSERT INTO amigo (id, id_color, id_sexo, id_mascota, nombre, estatura, hobby) VALUES ('0', '$id_color', '$id_sexo', '$id_mascota', '$nombre', '$estatura', '$hobby')";
      //fire query to save entries and check it with if statement
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
            echo "Successfully saved";
        }
      //connection closed.
        mysqli_close($con);
    }
?>