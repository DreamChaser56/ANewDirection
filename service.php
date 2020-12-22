<?php
/** 
 * Author: Shadow Themes
 * Author URL: http://shadow-themes.com
 */

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        # Replace this email with your email address
        $mail_to = "nsmith562630@gmail.com";

        # Message Subject. You can modify that string with your message.
        $subject = "Inquiry Of Service";
		
		# Collect Data
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
		$phone = trim($_POST["phone"]);
		$resident = $_POST["Register"];
		$Age = $_POST["Age"];
		$message1 = nl2br($_POST["message1"]);
		$message2 = nl2br($_POST["message2"]);
        
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($phone) OR empty($subject) OR empty($message1) OR empty($message2)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Please complete the form and try again.";
            exit;
        }
        
        # Mail Content
        $content = "Name:" . $name . "\r\n";
        $content .= "Email:" . $email . "\r\n";
		$content .= "Phone:" . $phone . "\r\n";
		$content .= "Resident of Georgia:" . $resident . "\r\n";
		$content .= "Age:" . $Age . "\r\n";
        $content .= "Inquire about counseling:" . $message1 . "\r\n";
		$content .= "What else would you like to share?:" . $message2 . "\r\n";

        # email headers.
        $headers = 	"Request Of Service";
        $mail_sent = mail($mail_to, $subject, $content, $headers);
        # Send the email.
        if (mail($mail_to, $subject, $content, $headers)) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong, we couldn't send your message.";
        }
	} else {
		# Not a POST request, set a 403 (forbidden) response code.
		http_response_code(403);
		echo "There was a problem with your submission, please try again.";
	}
?>
