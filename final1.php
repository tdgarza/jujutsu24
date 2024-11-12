<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Captura-Muestra</title>
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
        #formulario{
            background-color: #e1edf8;
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
        }
        #formulario label{
            display:block;
            margin-bottom:10px;
            color:#333;
        }
        #formulario input[type="text"]{
            width:50%;
            padding:10px;
            margin-bottom:20px;
            border: 1px solid #3498db;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
        }
        table{
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td{
           border: 2px solid white;
           border-radius; 50%;
        }
        th, td{
            padding: 8px;
            text-align: left;
            color: pink;
        }
        table tbody td:nth-child(odd){
            background: #e1edf8; /*color que quieran*/
        }
    </style>
    <script>
        $(document).ready(function(){
            //esta funcion carga y muestra los datos actualizados
            function actualizarDatos(){
                //esta es la pagina de la tabla
                $.get("mostrardatos2.php", function(data){
                    // esta parte de #resultados sera util para ponerle codigo en css 
                    $("#resultados").html(data);
                });
            }
            //con esto, se llama a la funcion para cargar los datos al cargar la pagina
            actualizarDatos();
            //manejo del envio del formulario
            $("#formulario").submit(function(event){
                event.preventDefault();
                $.post("insertarnuevo.php", $(this).serialize(), function(data){
                    $("#mensaje").html(data);
                    actualizarDatos(); //llama a la funcion para cargar los datos de la funcion
                    $("#formulario")[0].reset; //limpia el formulario
                });
            });
        });
    </script>
     <form id="formulario">
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
            <input type="text" id="puntos" name="puntos" required><br>
            <button><input type="submit" value="Agregar registro"></button>
    </form>
    <!-- Mensage de exito o error -->
    <div id="mensaje"></div>
    <!-- Mostrar datos actualizados -->
    <div id="resultados"></div>
</body>
</html>