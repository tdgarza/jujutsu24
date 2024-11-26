<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<link rel="stylesheet" type="text/css" href="guns.css">

<body>


<?php

/*https://hazloexpress.com/todos-los-join-mysql-select-con-dos-o-mas-tablas/
https://es.stackoverflow.com/questions/13556/enlazar-dos-tablas-en-mysql
https://www.baulphp.com/unir-dos-tablas-y-buscar-con-php-mysql/ */
echo "<table style='border: solid 1px red;'>";
echo "<tr><th>Id</th><th>Nombre</th><th>Nombre Real</th><th>Poderes</th><th>Primera Aparicion</th><th>Biografia</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:auto;border:1px solid red;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "avengers5";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT aliade.aliade, personaje.nombre FROM aliade
  INNER JOIN personaje ON aliade.id=personaje.id_aliade"
);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";




?>
</body>
</html>
