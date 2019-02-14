<!DOCTYPE html>

<!-- This and the books.sql file are what I have done of the database stuff. -->
<!-- This is definitively not done, but if you've got a database set up, it should give you a crude little table of the books in it. -->

<html lang="en">
	<head>
		<title>Store - Hadrosaur Productions</title>
		<?php include "metadata.php" ?>
	</head>
	
	<body style="padding-top: 70px">
		<?php include("navbar.php");?>
		
		<?php
			/* Attempt MySQL server connection. Assuming you are running MySQL
			server with default setting (user 'root' with no password) */
			$link = mysqli_connect("localhost", "root", "", "hadrosaur");
			 
			// Check connection
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			 
			
			//get all books
			$sql = "SELECT * FROM books";
			if($books = mysqli_query($link, $sql)){
				if(mysqli_num_rows($books) > 0){
					echo "<table>";
					echo "<tr>";
					echo "<th>id</th>";
					echo "<th>Title</th>";
					echo "<th>Author</th>";
					echo "<th>Description</th>";
					echo "</tr>";
					
					while($row = mysqli_fetch_array($books)){
						echo "<tr>";
							echo "<td>" . $row['id'] . "</td>";
							echo "<td>" . $row['title'] . "</td>";
							echo "<td>" . $row['author'] . "</td>";
							echo "<td>" . $row['description'] . "</td>";
						echo "<tr>";
					}
					
					
					
					mysqli_free_result($books);
				} else{
					echo "No records matching your query were found.";
				}
			}else{
				echo "Error: could not execute $sql";
			}
		?>
					
					
		<?php mysqli_close($link);?>
	</body>
</html>