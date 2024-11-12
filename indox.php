<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear base de datos</title>
</head>
<body>
<style>
    body{
        background-color: #3498db;
        color: #333;
        font-family: 'PaintMarkerDEMO', sans-serif;
        margin:0;
        padding:0;
        }
    h1{
        color: #c6ef10;
        }
</style>
    <div class="container">
        <h1>Crear base de datos</h1>
        <form action="crearbasededatos.php" method="POST">
            <label for="nombre_de_base_datos">Nombre de la base de datos:</label>
            <input type="text" id="nombre_de_base_datos" name="nombre_de_base_datos" required>
            <input type="submit" value="Crear base de datos">
        </form>
    </div>
    
</body>
</html>