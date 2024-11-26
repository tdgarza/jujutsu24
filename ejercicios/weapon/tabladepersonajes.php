<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<link rel="stylesheet" type="text/css" href="xmen.css">

<body>
<a aria-label='Thanks' class='h-button centered' data-text='METER' style="left: 280px; top: 400px;" href='./meterdatos.html'>
  <span>M</span>
  <span>U</span>
  <span>T</span>
  <span>A</span>
  <span>N</span>
  <span>T</span>
</a>
	<a aria-label='Thanks' class='h-button centered' style="left: 100px;  top: 400px;" data-text='DESPLEGAR' href='./tabladepersonajes.php'>
  <span>M</span>
  <span>U</span>
  <span>T</span>
  <span>A</span>
  <span>N</span>
  <span>T</span>
</a>	
	<a aria-label='Thanks' class='h-button centered' style="left: 460px;  top: 400px;" data-text='INICIO' href='./personajes.php'>  <span>M</span>
  <span>U</span>
  <span>T</span>
  <span>A</span>
  <span>N</span>
  <span>T</span>
</a>

<img class="logo" src="./xmenlogo.png" >
<div class="datos">

<?php
echo "<table style='border: solid 1px red;'>";
echo "<tr><th>Id</th><th>Nombre</th><th>Nombre Real</th><th>Poderes</th><th>Primera Aparicion</th><th>Biografia</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid red;'>" . parent::current(). "</td>";
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
$dbname = "xmen";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, nombre, nombrereal, poderes, primeraaparicion, bio FROM equipoazul");
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