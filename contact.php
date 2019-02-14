<?php
// FIXME: I'm 90% sure this works, but check before you use it to make sure

// Functions to filter user inputs
function filterName($field){
    // Sanitize user name
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    
    // Validate user name
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+/")))){
        return $field;
    }else{
        return FALSE;
    }
} 

   
function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    }else{
        return FALSE;
    }
}
function filterString($field){
    // Sanitize string
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    }else{
        return FALSE;
    }
}
 
// Define variables and initialize with empty values
$nameErr = $emailErr = $messageErr = $subjectErr = "";
$name = $email = $subject = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate user name
    if(empty($_POST["name"])){
        $nameErr = '  Please enter your name.';
    }else{
        $name = filterName($_POST["name"]);
        if($name == FALSE){
            $nameErr = '  Please enter a valid name.';
        }
    }
    
    // Validate email address
    if(empty($_POST["email"])){
        $emailErr = '  Please enter your email address.';     
    }else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $emailErr = '  Please enter a valid email address.';
        }
    }
    
    // Validate message subject
    if(empty($_POST["subject"])){
        $subject = "";
    }else{
        $subject = filterString($_POST["subject"]);
    }
    
    // Validate user comment
    if(empty($_POST["message"])){
        $messageErr = '  Please enter your message.';     
    }else{
        $message = filterString($_POST["message"]);
        if($message == FALSE){
            $messageErr = '  Please enter a valid message.';
        }
    }
    
    // Check input errors before sending email
    if(empty($nameErr) && empty($emailErr) && empty($messageErr)){
        // Recipient email address
        $to = 'hadrosaur@zianet.com';
        
        // Create email headers
        $headers = 'From: '. $email . "\r\n" .
        'Reply-To: '. $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
        // Sending email
        if(mail($to, $subject, $message, $headers)){
            echo '<p class="text-success">Your message has been sent successfully!</p>';
        }else{
            echo '<p class="text-danger">Unable to send email. Please try again!</p>';
        }
    }
}
?>

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
			<form action="contact.php" method="post" class="col-md-8">
				<div class="form-group">
					<label for="name">Name<sup>*</sup></label><span class="text-danger"><?php echo $nameErr; ?></span>
					<input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
					
					<label for="email">Email<sup>*</sup></label><span class="text-danger"><?php echo $emailErr; ?></span>
					<input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
					
					<label for="subject">Subject</label>
					<input type="text" name="subject" id="subject" class="form-control" value="<?php echo $subject; ?>">
					
					<label for="message">Message<sup>*</sup></label><span class="text-danger"><?php echo $messageErr; ?></span>
					<textarea name="message" rows="5" cols="50" class="form-control" value="<?php echo $message ?>"></textarea>
					<br>
					<input type="submit" class="btn btn-success" value="Submit">
					<input type="reset" class="btn btn-warning" value="Reset">
				</div>
			</form>
		</div>
		
		<br>
		<?php include "footer.php";?>
	</body>
	
</html>