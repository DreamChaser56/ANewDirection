<?php
if (isset($_POST['submit'])){
	$mail_to = 'nsmith562630@gmail.com'; // specify your email here

	// Assigning data from $_POST array to variables
	$name = $_POST['name'];
	$email = $_POST['email'];
    $phone = $_POST['phone'];
    $resident = $_POST['Register'];
    $age = $_POST['Age'];
    $message1 = $_POST['message1'];
    $message2 = $_POST['message2'];
	
	
	// Construct subject of the email
	$subject = 'Request Of Service From' . $name;

	// Construct email body
	$body_message = 'From: ' . $name . "\r\n";
	$body_message .= 'E-mail: ' . $email . "\r\n";
    $body_message .= 'Phone: ' . $phone . "\r\n";
    $body_message .= 'Resident of Georgia: ' . $resident . "\r\n";
    $body_message .= 'Age: ' . $Age . "\r\n";
    $body_message .= 'Inquire about counseling:: ' . $message1;
    $body_message .= 'What else would you like to share?:: ' . $message2;

	// Construct headers of the message
	$headers = 'From: ' . $email . "\r\n";
	$headers .= 'Reply-To: ' . $email . "\r\n";

	$mail_sent = mail($mail_to, $subject, $body_message, $headers);

	if ($mail_sent == true){ ?>
		<script language="javascript" type="text/javascript">
		alert('Thank you for the message. We will contact you shortly.');
		window.location = 'contact-form.html';
		</script>
	<?php } else { ?>
    <script language="javascript" type="text/javascript">
        alert('Message not sent. Please, notify site administrator admin@admin.com');
        window.location = 'contact-form.html';
    </script>
	<?php
	}
}
?>
