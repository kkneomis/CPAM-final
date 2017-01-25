<?php

	$subject = 'CPAM Website information Request Subsription'; // Set email subject line here
	$mailto  = 'Cpam@montgomerycollege.edu'; // Email address to send form submission to
	
	$name = $_POST['banner-name'];
	$email = $_POST['banner-email'];
    $message = $_POST['banner-message'];
	$timestamp = date("F jS Y, h:iA.", time());

	// HTML for email to send submission details
	$body = "
	<br>
	<p>CPAM Information Request</p>
	<p><strong>Name</strong>: $name</p>
	<p><strong>Email</strong>: $email</p>
    <p><strong>Message</strong>: $message</p>
	<hr/>
	<p>This form was submitted on <strong>$timestamp</strong></p>
	";

	// Success Message
	$success = "Successfully subscribed";

	$headers = "From: $name <$email> \r\n";
	$headers .= "Reply-To: $email \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = "<html><body>$body</body></html>";

	if (mail($mailto, $subject, $message, $headers)) {
		header("Location:index.html");
	} else {
		echo 'Form submission failed. Please try again...'; // failure
	}

?>