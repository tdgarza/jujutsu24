<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">	
</head>
<body>
	<?php

	// Connect to database
	$con = mysqli_connect("localhost","root","","xmen");
	
	// mysqli_connect("servername","username","password","database_name")

	// Get all the categories from category table
	$sql = "SELECT * FROM `equipoazul`";
	$all_categories = mysqli_query($con,$sql);

?>
	<form method="POST" action="menu.php">
		<label>Select a Category</label>
		<select name="Category">
			<?php
				while ($category = mysqli_fetch_array($all_categories,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $category["id"];
			
				?>">
					<?php echo $category["nombre"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</select>
		<br>
		
		<?php 
		$id=$con -> real_escape_string($_POST['id']);
		$extraerdato = $con->query("SELECT * FROM equipoazul");
		$fetch = mysqli_fetch_array($extraerdato);
			 
		echo $nombre = $fetch['nombre'];
		echo $nombrereal = $fetch['nombrereal'];
		echo $poderes = $fetch['poderes']; 
		echo $primeraaparicion = $fetch['primeraaparicion'];
		echo $bio = $fetch['bio']; 
		  
		?>
	</form>
	<input type="submit" value="submit" name="submit">
	<br>
	
</body>
</html>
