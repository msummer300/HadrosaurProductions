<!DOCTYPE html>

<html lang="en">
	<head>
		<title>Contact Us - Hadrosaur Productions</title>
		<?php include "metadata.php";?>
		
		<style>
			.mailing{
				margin: 0px;
				padding: 0px;
			}
		</style>
	</head>
	
	<body style="padding-top: 70px">
	
		<?php include "navbar.php";?>
		
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="text-center">Contact Us</h1>
				</div>
			</div>
			
			<div class="row">
				<div class="col">
					<h3> Mailing Address</h3>
					<p class="mailing">Hadrosaur Productions</p>
					<p class="mailing">P.O. Box 2194</p>
					<p class="mailing">Mesilla Park, NM 88047</p>
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<h3>Send us a Message</h3>
			<p>Note: This does not work yet</p>
			<form method="post" action="" class="col-md-8">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" id="name" class="form-control">
					
					<label for="email">Email</label>
					<input type="email" id="email" class="form-control">
					
					<label for="message">Message</label><br>
					<textarea name="message" rows="5" cols="50" class="form-control"></textarea>
					<br>
					<input type="submit" class="btn btn-success" value="Submit">
				</div>
			</form>
		</div>
		
		<br>
		<?php include "footer.php";?>
	</body>
	
</html>